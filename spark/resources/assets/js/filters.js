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
 * Format the given date as a timestamp.
 */
Vue.filter('small-time', value => {
    return moment.utc(value).local().format('h:mm:ss A');
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
            m:  "m",
            mm: "%dm",
            h:  "1h",
            hh: "%dh",
            d:  "1d",
            dd: "%dd",
            M:  "1m",
            MM: "%dm",
            y:  "1y",
            yy: "%dy"
        }
    });

    return moment.utc(value).local().fromNow();
});

Vue.filter('object-name', value => {
    console.log(value[0]);
});