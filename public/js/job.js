let jobBox = document.getElementById('job-box');
let seeMore = document.getElementById('seemore');
jobBox.addEventListener('mouseover', function() {
    seeMore.classList.add('d-play');
    console.log('hello');
})