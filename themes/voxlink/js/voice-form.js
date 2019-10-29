(function($){

    //STEPS




    var currentStep = 1;
    var totalSteps = 0;
    $(".ir-step").each(function(){
        totalSteps++;
    });
    var stepHalfWith = 100*0.5/totalSteps;


    $(".ir-prev,.ir-next").on("click", function(){
        var thisStepBlock = $(".ir-step-block.active");
        var errors = 0;
        if($(this).hasClass("ir-next")){
            thisStepBlock.find('input,textarea').each(function(i){
                $(this).validate();
                if($(this).hasClass("error")){
                    errors++;
                }
            });
            if(errors == 0){
               currentStep++;
            } else {
                var errorInputOffset = 0;
                thisStepBlock.find('.has-error').each(function(i){
                    if(i == 0){
                        errorInputOffset = $(this).offset().top - 25;
                    }
                });
                $('html,body').animate({ scrollTop: errorInputOffset }, 400);
            }
        }else{
            currentStep--;
        }

        if(errors == 0){
            //Progress
            var progressWidth = (100*currentStep/totalSteps)-stepHalfWith;
            $(".ir-progress").css("width",progressWidth+"%");

            //Step Header Classes
            $(".ir-step").removeClass("past");
            $(".ir-step[data-step="+currentStep+"]").addClass("current").prevAll(".ir-step").addClass("past");
            $(".ir-step[data-step="+currentStep+"]").siblings(".ir-step").removeClass("current");

            //ChangeStepBlock

            $(".ir-step-block.active").removeClass("show").on("transitionend", function(){
                $(this).removeClass("active");
                $(".ir-step-block[data-step="+currentStep+"]").addClass("active show");
            });

            var stepsNavOffset = $(".ir-steps").offset().top - 25;
            $('html,body').animate({ scrollTop: stepsNavOffset }, 400);
        }
    });
    $('[data-step="2"] .isb-audios2:first-child .isb-audios-column:first-child input').attr("checked", true);

    $("[data-step='1'] .isb-audios input").on("change", function(){
       var value = $(this).val();
       $('[data-step="2"] .isb-audios2 input').removeAttr("checked");
       $('[data-step="2"] .isb-audios2').removeClass("visible").addClass("hidden");
       var current = $('[data-step="2"] .isb-audios2[data-dictor="'+value+'"]');
       current.removeClass("hidden").addClass("visible");
       current.find(".isb-audios-column:first-child input").attr("checked", true);
    });

    //Audio Controls

    var currentPlay;

    function audioTrack(track){
        var slider = track.find(".isbat-volume")[0];
        var audio = track.find("audio")[0];
        var playBtn = track.find(".isbat-play");
        var text = track.find("p");

        var slideStarted = 0;
        var audioLoaded = 0;


        var stopAudio = function(track,audio,updateSlider,text){
            track.find(".isbat-play").removeClass("stop");
            audio.pause();
            audio.currentTime = 0.0;
            updateSlider.noUiSlider.set(0);
            text.text("Включить демо");
        }

        var changeAudio = function(values, audio){
            var currentPercent = parseInt(values[0]);
            var currentTime = currentPercent*audio.duration/100;
            audio.currentTime = currentTime;
        }



        audio.addEventListener("loadedmetadata", function(){
            audioLoaded = 1;
        });

        audio.addEventListener("ended", function(){
            stopAudio(track,audio,slider);
        });

        noUiSlider.create(slider, {
            start: 0,
            step: 1,
            connect: [true, false],
            range: {
                'min': 0,
                'max': 100
            }
        });





        slider.noUiSlider.on("start", function(values){
            slideStarted = 1;
        });

        slider.noUiSlider.on("end", function(values){
            if(audioLoaded == 1 && slideStarted == 1){
                changeAudio(values, audio);
                slideStarted = 0;
            }
        });

        slider.noUiSlider.on("change", function(values){
            changeAudio(values, audio);
        });




        playBtn.on("click", function(){

            if(playBtn.hasClass("stop")){
                stopAudio(track, audio, slider, text);
            }else{
                //Если играет текущий трэк, то остановить его

                if(currentPlay){
                    var currentPlayUpdateSlider = currentPlay.find(".isbat-volume")[0];
                    var currentPlayAudio = currentPlay.find("audio")[0];
                    var currentText = currentPlay.find("p");
                    stopAudio(currentPlay, currentPlayAudio, currentPlayUpdateSlider, currentText);
                }
                currentPlay = track;
                text.text("Остановить демо");
                playBtn.addClass("stop");
                audio.play();
                audio.addEventListener("timeupdate", function(e){
                    if(slideStarted == 0){ // Менять занчение при пригрывании трэка, только если пользователь сейчас не тягает слайдер
                        var percent = audio.currentTime*100/audio.duration;
                        slider.noUiSlider.set(percent);
                    }
                });
            }
        });
    }


    $(".isb-audio-track").each(function(){
        audioTrack($(this));
    });
})(jQuery);