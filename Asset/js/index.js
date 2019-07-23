
let c;
let s;
let m;

function change_values() {
    let check_connection = document.querySelector('[name=check_connection]');
    let store_remake = document.querySelector('[name=store_remake]');
    let monitor_requests = document.querySelector('[name=monitor_requests]');
    c = check_connection.checked;
    s = store_remake.checked;
    m = monitor_requests.checked;
}

document.getElementById('save').onclick = function () {
    change_values();
    Offline.options = {
        game: true,
        checkOnLoad: c,
        requests: s,
        interceptRequests: m,
        reconnect: {
            initialDelay: 15,
            delay: 10
        }
    };
};


