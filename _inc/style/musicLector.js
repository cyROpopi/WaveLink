const audio = document.querySelector('audio');
const totalTime = document.getElementById('total-time');
const lector = document.getElementById("lector");
const soundBar = document.getElementById("sound-bar");
const soundVolume = document.getElementById("sound-volume");
const progressTime = document.getElementById("progress-time");
const playButton = document.getElementById("play-button");
const pauseButton = document.getElementById("pause-button");
const musicName = document.getElementById("music-name");

totalTime.textContent = buildDuration(audio.duration);
lector.setAttribute("max", audio.duration)
musicName.textContent = audio.src;

function buildDuration(duration) {
    let min = Math.floor(duration / 60);
    let sec = String(Math.floor(duration % 60)).padStart(2,'0');
    return min +':' + sec;
}

playButton.addEventListener("click", function(){
    audio.play();
    playButton.style.display = "none";
    pauseButton.style.display = "initial";
});

pauseButton.addEventListener("click", function(){
    audio.pause();
    playButton.style.display = "initial";
    pauseButton.style.display = "none";
    console.log(audio.currentTime);
});

audio.addEventListener("timeupdate", function(){
    progressTime.textContent = buildDuration(this.currentTime);
    lector.value = this.currentTime;
    audio.volume = soundBar.value /100;
});

lector.addEventListener("input", function(){
    audio.currentTime = this.value;
    progressTime.textContent = buildDuration(this.value);
});

soundBar.addEventListener("input", function(){
    soundVolume.textContent = this.value + "%";
});

