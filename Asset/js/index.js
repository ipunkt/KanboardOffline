function reqListener () {
    console.log(this.responseText);
}
reqListener();
let req = new XMLHttpRequest();
req.onload = function() {
  let check_on_load = this.responseText;
  console.log(check_on_load);
  // alert(check_on_load);
};
// req.open('get', 'offline-settings-page.php', true);
// req.send();

Offline.options = {
    game: true,
    checkOnLoad: false,
    requests: true,
    interceptRequests: true,
    reconnect: {
        initialDelay: 15,
        delay: 10
    }
};

