$(document).ready(function () {
    let timerInterval;
    let timeLimit;
    let totalTypedWords = 0;
    let correctWords    = 0;
    let wrongWords      = 0;

    $('#typing-form').on('submit', function (e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            success: function (response) {
                if (response.status === true) {
                    $('#textPassage').html(response.data.passage);
                    $('#typeTime').val(response.data.time);
                } else {
                    $('#response-message').html('<p class="text-red-600">Error: ' + response.message + '</p>');
                }
            },
            error: function () {
                $('#response-message').html('<p class="text-red-600">An error occurred. Please try again later.</p>');
            }
        });
    });

    // Start typing and timer
    $('#type_here').on('focus', function () {
        timeLimit = $('#typeTime').val() * 60; // Convert minutes to seconds
        startTimer(timeLimit);
    });

    // Track input and match with passage
    $('#type_here').on('input', function () {
        let passage = $('#textPassage').text().trim();
        let typedText = $(this).val();
        matchTypedText(typedText, passage);
    });

    // Match typed text and calculate metrics
    function matchTypedText(typedText, passage) {
        let wordsInPassage = passage.split(' ');
        let typedWords = typedText.split(' ');

        correctWords = 0;
        wrongWords = 0;
        let resultHtml = '';

        for (let i = 0; i < wordsInPassage.length; i++) {
            if (typedWords[i] === wordsInPassage[i]) {
                correctWords++;
                resultHtml += `<span class="text-green-600">${wordsInPassage[i]}</span> `;
            } else if (typedWords[i] !== undefined) {
                wrongWords++;
                resultHtml += `<span class="text-red-600">${wordsInPassage[i]}</span> `;
            } else {
                resultHtml += `${wordsInPassage[i]} `;
            }
        }

        $('#typing-results').html(resultHtml.trim());
        totalTypedWords = typedWords.length; // Update total typed words
    }

    // Start timer
    function startTimer(timeRemaining) {
        clearInterval(timerInterval); // Ensure no duplicate timers
        timerInterval = setInterval(function () {
            timeRemaining--;
            let minutes = Math.floor(timeRemaining / 60);
            let seconds = timeRemaining % 60;
            $('#timer').text(`${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`);

            if (timeRemaining <= 0) {
                clearInterval(timerInterval);
                calculateStats();
                $('#typing-form').submit();
            }
        }, 1000);
    }

    // Calculate typing statistics
    function calculateStats() {
        let elapsedMinutes = $('#typeTime').val(); // Total time in minutes
        let grossWPM = totalTypedWords / elapsedMinutes;
        let netWPM = (correctWords - wrongWords) / elapsedMinutes;
        let accuracy = (correctWords / totalTypedWords) * 100 || 0;

        $('#stats').html(`
            <p>Gross WPM: ${grossWPM.toFixed(2)}</p>
            <p>Net WPM: ${netWPM.toFixed(2)}</p>
            <p>Accuracy: ${accuracy.toFixed(2)}%</p>
            <p>Total Typed Words: ${totalTypedWords}</p>
            <p>Correct Words: ${correctWords}</p>
            <p>Wrong Words: ${wrongWords}</p>
        `);
    }
});
