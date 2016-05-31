/**
 * Format the given date.
 */
Vue.filter('date', value => {
    return moment.utc(value).local().format('MMMM Do, YYYY')
});


/**
 * Format the given date as a timestamp.
 */
Vue.filter('datetime', value => {
    return moment.utc(value).local().format('MMMM Do, YYYY h:mm A');
});


/**
 * Format the given date into a relative time.
 */
Vue.filter('relative', value => {
    moment.locale('en', {
        relativeTime : {
            future: "in %s",
            past:   "%s",
            s:  "1s",
            m:  "1m",
            mm: "%dm",
            h:  "1h",
            hh: "%dh",
            d:  "1d",
            dd: "%dd",
            M:  "1 month ago",
            MM: "%d months ago",
            y:  "1y",
            yy: "%dy"
        }
    });

    return moment.utc(value).local().fromNow();
});

Vue.filter('relativeFull', value => {
    moment.locale('en', {
        relativeTime : {
            future: "in %s",
            past:   "%s",
            s:  "1 second ago",
            m:  "minute ago",
            mm: "%d minutes ago",
            h:  "1 hour ago",
            hh: "%d hours ago",
            d:  "1 day ago",
            dd: "%d days ago",
            M:  "1 month ago",
            MM: "%d months ago",
            y:  "1 year ago",
            yy: "%d years ago"
        }
    });

    return moment.utc(value).local().fromNow();
});