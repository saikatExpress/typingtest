$(document).ready(function () {

    clearAllFeilds();

    let timerInterval;
    let timeLimit;

    // Initialize events
    initializeEvents();

    // Function to initialize event listeners
    function initializeEvents() {
        $('#start_typing').on('click', handleStartTyping);
        $('#type_here').on('focus', handleTypingStart);
        $('#type_here').on('input', handleTypingInput);
    }

    // Handle start typing button click
    function handleStartTyping(e) {
        e.preventDefault();

        const category  = $('#category').val();
        const totalWord = $('#total_word').val();
        const stdId     = $('#std_id').val();
        const name      = $('#name').val();

        if (!category || !totalWord || !name || !stdId) {
            displayMessage('Please fill all fields.', 'error');
            return;
        }

        getPassage(category, totalWord, name, stdId);
    }

    // Handle typing input focus to start the timer
    function handleTypingStart() {
        timeLimit = $('#typeTime').val() * 60; // Convert minutes to seconds
        if (timeLimit && !timerInterval) {
            startTimer(timeLimit);
        }
    }

    // Handle typing input
    function handleTypingInput() {
        const typedText = $(this).val();
        const passageText = $('#textPassage').text();

        $('#textPassage').hide();
        $('#typing-results').show();

        const comparison = compareText(typedText, passageText);
        $('#typing-results').html(comparison.highlightedText);
    }

    // Start countdown timer
    function startTimer(timeRemaining) {
        clearInterval(timerInterval); // Clear any previous timer
        timerInterval = setInterval(() => {
            if (timeRemaining > 0) {
                timeRemaining--;
                updateTimerDisplay(timeRemaining);
            } else {
                clearInterval(timerInterval);
                $('#timer').text('00:00');
                calculateStats();
                submitForm();
            }
        }, 1000);
    }

    // Update timer display
    function updateTimerDisplay(timeRemaining) {
        const minutes = Math.floor(timeRemaining / 60);
        const seconds = timeRemaining % 60;
        $('#timer').text(`${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`);
    }

    // Compare typed text with passage
    function compareText(typed, passage) {
        let highlightedText = '';
        const wordsTyped = typed.split(' ');
        const wordsPassage = passage.split(' ');

        wordsPassage.forEach((word, index) => {
            if (wordsTyped[index] === word) {
                highlightedText += `<span class="text-green-600">${word}</span> `;
            } else {
                highlightedText += `<span class="text-red-600">${word}</span> `;
            }
        });

        return { highlightedText };
    }

    // Calculate stats (GWPM, NWPM, Accuracy)
    function calculateStats() {
        const typedText = $('#type_here').val();
        const passageText = $('#textPassage').text();
        const typedWords = typedText.trim().split(/\s+/).length;
        const correctWords = typedText.split(' ').filter((word, index) => word === passageText.split(' ')[index]).length;
        const timeTaken = $('#typeTime').val() * 60 - timeLimit;

        const gwpm = (typedWords / (timeTaken / 60)).toFixed(2);
        const nwpm = (correctWords / (timeTaken / 60)).toFixed(2);
        const accuracy = ((correctWords / typedWords) * 100).toFixed(2);

        $('#gwpm').text(gwpm);
        $('#nwpm').text(nwpm);
        $('#accu').text(`${accuracy}%`);
    }

    // Submit the form via AJAX
    function submitForm() {
        const data = {
            name: $('#name').val(),
            std_id: $('#std_id').val(),
            category: $('#category').val(),
            time_count: $('#passage').val(),
            passage: $('#textPassage').text(),
            typed_text: $('#type_here').val(),
            gwpm: $('#gwpm').text(),
            nwpm: $('#nwpm').text(),
            accuracy: $('#accu').text(),
            _token: $('meta[name="csrf-token"]').attr('content'),
        };

        $.ajax({
            url: '/typing-results',
            method: 'POST',
            data: data,
            success: function (response) {
                if(response && response.status === true){
                    let skippedWords = response.data.skipped_words;
                    let wordCount = calculateWordCount(skippedWords);
                    Swal.fire({
                        icon: 'success',
                        title: 'Results saved successfully!',
                        text: 'The typing results have been processed and saved.',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        $('#std_name').text(response.data.name);
                        $('#gwpm').text(response.data.gross_wpm);
                        $('#net_wpm').text(response.data.net_wpm);
                        $('#accuracy').text(response.data.accuracy);
                        $('#double_words').text(response.data.double_words);
                        $('#skipped_words').text(wordCount);
                        displayMessage('Results saved successfully!', 'success');
                        $('#result_box').show();
                        $('#type_here').prop('disabled', true);
                        $('html, body').animate({
                            scrollTop: $('#result_box').offset().top
                        }, 1000);
                    });
                }
            },
            error: function () {
                displayMessage('An error occurred while saving results.', 'error');
            },
        });
    }
    function calculateWordCount(words) {
        const wordArray = words.split(',').filter(word => word.trim() !== '');
        return wordArray.length;
    }

    // Fetch passage dynamically
    function getPassage(category, totalWord, name,stdId) {
        const formData = {
            name: name,
            stdId: stdId,
            category: category,
            total_word: totalWord,
            _token: $('meta[name="csrf-token"]').attr('content'),
        };

        $.ajax({
            url: '/get-passage',
            method: 'POST',
            data: formData,
            success: function (response) {
                if (response.status === true) {
                    $('#textPassage').html(response.data.passage);
                    $('#typeTime').val(response.data.time);
                    displayMessage('Passage loaded successfully!', 'success');
                    $('#passage_box').show();
                    $('html, body').animate({
                        scrollTop: $('#passage_box').offset().top
                    }, 1000);
                } else {
                    displayMessage(`Error: ${response.message}`, 'error');
                }
            },
            error: function () {
                displayMessage('An error occurred. Please try again later.', 'error');
            },
        });
    }

    // Display response message
    function displayMessage(message, type) {
        const color = type === 'success' ? 'text-green-600' : 'text-red-600';
        $('#response-message').html(`<p class="${color}">${message}</p>`);
    }

    /**
     * Clear all form fields: input, select, textarea, checkbox, radio
     */
    function clearAllFeilds()
    {
        $('input').val('');

        $('select').val('');

        $('textarea').val('');

        $('input[type="checkbox"], input[type="radio"]').prop('checked', false);
    }
});
