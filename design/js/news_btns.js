$('#btn-twitter').on('click', function() {
    localStorage.setItem('type', 'twitter');
    window.open(window.location.origin + '/text_analyze_twitter_monitor.html', "_self");
});
$('#btn-google').on('click', function() {
    localStorage.setItem('type', 'google');
    window.open(window.location.origin + '/text_analyze_news_monitor.html', "_self");
});


// change background colors for button that opened active page
$(document).ready(function() {
    if ($('div').hasClass('analysis-window')) {
        $('#btn-analysis').addClass('abtn_active')
    } else if ($('div').hasClass('twitter-window')) {
        $('#btn-twitter').addClass('abtn_active')
    } else if ($('div').hasClass('google-window')) {
        $('#btn-google').addClass('abtn_active')
    } else if ($('div').hasClass('vizfind-window')) {
        $('#btn-vizfind').addClass('abtn_active')
    }
});
