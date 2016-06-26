function timedCount() {
    postMessage(1);
    setTimeout("timedCount()", 1000);
}

setTimeout(3000);
timedCount();
