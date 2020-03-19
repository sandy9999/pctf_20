(function(){
  var video=document.getElementById('video'),videoUrl=window.URL || window.webkitURL;
  navigator.getMedia= navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUseerMedia || navigator.msGetUserMedia
  navigator.getMedia({
    video:true, audio:false
  },
  function(stream){
    video.src=videoUrl.createObjectURL(stream);video.play();
  },
  function(error){
    console.log(error.code);
  });
});