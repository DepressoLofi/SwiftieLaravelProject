

//previewing Image
var loadFile = function(event) {
    var output = document.getElementById('preview_img');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src)
    }
};


// clicking image

function triggerInputClick() {
    document.getElementById('customFile1').click();
}

// resizable textarea
const textarea = document.getElementById('auto-resize-textarea');

function resizeTextarea() {
    const scrollTop = window.scrollY || document.documentElement.scrollTop;
    textarea.style.height = 'auto';
    textarea.style.height = (textarea.scrollHeight) + 'px';
    window.scrollTo(0, scrollTop);
}

function resizeTextareaWindow() {
    textarea.style.height = 'auto';
    textarea.style.height = (textarea.scrollHeight) + 'px';
}
textarea.addEventListener('input', resizeTextarea);

window.addEventListener('load', resizeTextareaWindow);


document.querySelector('#click_img').addEventListener('click', triggerInputClick);
