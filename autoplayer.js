const audio_player = document.getElementById("audio-player");
audio_player.volume = 0.1;
let is_playing = false;
function tryToAutoPlay() {
  if (!is_playing) {
    audio_player
      .play()
      .then(() => {
        is_playing = true;
      })
      .catch(() => {
        console.log("L'utilisateur n'a pas encore cliqué sur la page");
      });
  }
}

setInterval(tryToAutoPlay, 1000);
