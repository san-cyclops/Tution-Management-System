let listVideo = document.querySelectorAll('.related-video .video-list');
let mainVideo = document.querySelector('.mainVideo-content video');
let title = document.querySelector('.mainVideo-content .title');
listVideo.forEach(video => {
    video.onclick = () => {
        listVideo.forEach(vid =>vid.classList.remove('active'));
        video.classList.add('active');
        if(video.classList.contains('active')){
            let src = video.children[0].getAttribute('src');
            mainVideo.scr = src;

        };

        


    };
});




    

