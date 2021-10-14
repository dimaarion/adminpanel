
function gallery() {
    (function () {
        // helpers
        var regExp = function (name) {
            return new RegExp('(^| )' + name + '( |$)');
        };
        var forEach = function (list, fn, scope) {
            for (var i = 0; i < list.length; i++) {
                fn.call(scope, list[i]);
            }
        };

        // class list object with basic methods
        function ClassList(element) {
            this.element = element;
        }

        ClassList.prototype = {
            add: function () {
                forEach(arguments, function (name) {
                    if (!this.contains(name)) {
                        this.element.className += ' ' + name;
                    }
                }, this);
            },
            remove: function () {
                forEach(arguments, function (name) {
                    this.element.className =
                        this.element.className.replace(regExp(name), '');
                }, this);
            },
            toggle: function (name) {
                return this.contains(name)
                    ? (this.remove(name), false) : (this.add(name), true);
            },
            contains: function (name) {
                return regExp(name).test(this.element.className);
            },
            // bonus..
            replace: function (oldName, newName) {
                this.remove(oldName), this.add(newName);
            }
        };

        // IE8/9, Safari
        if (!('classList' in Element.prototype)) {
            Object.defineProperty(Element.prototype, 'classList', {
                get: function () {
                    return new ClassList(this);
                }
            });
        }

        // replace() support for others
        if (window.DOMTokenList && DOMTokenList.prototype.replace == null) {
            DOMTokenList.prototype.replace = ClassList.prototype.replace;
        }
    })();
    let imgDirBoxGallery = document.getElementsByClassName("imgDirBoxGallery");
    imgDirBoxGallery = Array.from(imgDirBoxGallery);
    for (let i = 0; i < imgDirBoxGallery.length; i++) {
        imgDirBoxGallery[i].addEventListener("click", () => {
            let d = document.getElementsByClassName("dirBoxGallery")[i];

            if (d.classList.contains("displayNone")) {
                d.classList.replace("displayNone", "displayBlock");
            } else {
                d.classList.replace("displayBlock", "displayNone");
            }

        })
    }
    let iconBaseDir = document.getElementsByClassName("iconBaseDir");
    let text_block2 = document.getElementsByClassName("text_block2")[0];
    if (text_block2 !== undefined) {
        let div;
        iconBaseDir = Array.from(iconBaseDir);
        for (let i = 0; i < iconBaseDir.length; i++) {
            iconBaseDir[i].addEventListener("click", (e) => {
                let img = document.createElement("img");
                let divCol = document.createElement("div");
                if (document.getElementById("boxGalleryLite") === null) {
                    div = document.createElement("div");
                    document.body.appendChild(div);
                    text_block2.appendChild(div);
                    div.id = "boxGalleryLite";
                    div.className = "row"
                } else {
                    div = document.getElementById("boxGalleryLite");
                }



                document.body.appendChild(divCol);
                document.body.appendChild(img);
                divCol.appendChild(img);
                div.appendChild(divCol);
                //
                divCol.className = "col-sm-3 p-0 m-2 boxGalleryImage";
                divCol.setAttribute("style", "overflow:hidden; height:200px; ")
                //
                img.className = "galleryLite";
                img.src = e.target.src;
                img.setAttribute("style", "width:100%;");

            })


        }
    }
}


$(document).ready(function () {
    gallery();
});