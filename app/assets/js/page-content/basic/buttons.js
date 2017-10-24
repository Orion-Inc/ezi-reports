$(document).ready(function() {
    Ladda.bind('.ladda-button:not(.ladda-progress)', {
        timeout: 2000
    });
    Ladda.bind('.ladda-progress', {
        callback: function(instance) {
            var progress = 0;
            var interval = setInterval(function() {
                progress = Math.min(progress + Math.random() * 0.1, 1);
                instance.setProgress(progress);
                if (progress === 1) {
                    instance.stop();
                    clearInterval(interval);
                }
            }, 200);
        }
    });
});