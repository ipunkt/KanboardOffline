import 'offline.min';

Offline.options = {
    checkOnLoad: false,
    interceptRequests: true,
    requests: true,
    game: true,
    reconnect: {
        initialDelay: 5,
        delay: 15
    }
};

// Offline.on('up');


