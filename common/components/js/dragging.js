function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev, type) {
    ev.dataTransfer.setData(type, ev.target.id);
}

function drop(ev, type) {

    ev.preventDefault();
    let realType = ev.dataTransfer.types[12];
    let localName = ev.target.localName;
    if (realType == type && localName == "div") {
        let data = ev.dataTransfer.getData(type);
        ev.target.appendChild(document.getElementById(data));
    }
}

function dropImage(ev, type) {
    ev.preventDefault();
    let realType = ev.dataTransfer.types[12];
    if (realType == type) {
        let src = document.getElementById(ev.dataTransfer.getData(type));
        let srcParent = src.parentNode;
        let dest = ev.target;
        let destParent = ev.target.parentNode;
        let srcTmp = src.cloneNode(1);
        dest = destParent.replaceChild(srcTmp, dest);
        srcParent.replaceChild(dest,src);
        destParent.replaceChild(src,srcTmp);
        srcTmp = null;
    }
}
