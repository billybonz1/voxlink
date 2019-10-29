
    <?php 
     
        $hideBanners = [];
        foreach($_COOKIE as $key=>$cookie){
            if(strpos($key, "banner") !== false){
                $hideBanners[] = preg_replace('/[^0-9]/', '', $key);
            }
        }
        
        function checkWithProbability($probability=0.1, $length=10000)
        {
           $test = mt_rand(1, $length);
           return $test<=$probability*$length;
        }
         if(count($hideBanners) == 0){
        
            $banners = get_posts(array(
                "post_type" => "banners",
                "posts_per_page" => -1,
                'meta_key'		=> 'status',
    	        'meta_value'	=> '1',
    	        'exclude' => $hideBanners
            ));
            
            $bannersArr = [];
            foreach($banners as $banner){
                $arr = [];
                $arr['id'] = $banner->ID;
                $meta = get_post_meta($banner->ID);
                
                $arr['date'] = $meta['date'][0];
                $arr['text'] = $meta['text'][0];
                $arr['bg'] = wp_get_attachment_url($meta['bg'][0]);
                $arr['title'] = wp_get_attachment_url($meta['title'][0]);
                $arr['url'] = $meta['url'][0];
                $arr['probability'] = $meta['probability'][0];
                $arr['global_options'] = $meta['global_options'][0];
                $arr['timetoshow'] = $meta['timetoshow'][0];
                $arr['type'] = $meta['type'][0];
                $bannersArr[$arr['probability']] = $arr;
            }
            
            ksort($bannersArr);
            
            $mustShow = [];
            foreach($bannersArr as $key=>$banner){
                $show = checkWithProbability((int)$banner['probability']/100, count($bannersArr));
                if($show === true){
                    $mustShow[$banner['probability']] = $key;
                }
            }
            ksort($mustShow);
            
            if(count($mustShow) == 0){
                $currentBanner = end($bannersArr);
            }else{
                $currentBanner = $bannersArr[end($mustShow)];
            }
            
            
        ?>
        
    
        <?php if(is_array($currentBanner)){?>
            <?php if($currentBanner['type'] == "right"){?>
                <div id="newBanner<?php echo $currentBanner['id']; ?>" class="new-right-banner">
                    <div>
                        <h2>
                            <div>Однодневный</div>
                            <div>курс MikroTik</div>
                        </h2>
                        <p>
                            получи лицензию 
                            <span>RouterOS L4</span>
                            <strong>в подарок</strong>
                        </p>
                        <p class="nrb-mini">
                            Оставьте заявку
                        </p>
                        <form>
                            <div style="display: none;">
                               <input type="text" name="fullName" value="" />
                           </div>
                            <label>
                              <input type="tel" name="phone" placeholder="+7 (___) ___ __ __" />
                              
                            </label>
                            <input type="submit" />
                            <input type="hidden" name="subject" value="Однодневный курс MikroTik(Правый баннер)">
                            <input type="hidden" name="action" value="submitForm">
                            <input type="hidden" name="actionName" value="Отправка формы">
                            <?php
                              $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            ?>
                            <input type="hidden" name="url" value="<?php echo $actual_link; ?>">
                        </form>
                        <a href="http://mikrotik.team" class="nrb-link" target="_blank">Подробнее на сайте</a>
                        <div class="nrb-dates">
                            <div class="nrb-date">
                                <strong>2</strong>
                                <p>
                                    августа
                                </p>
                                <span>
                                     Базовый курс
                                </span>
                            </div>
                            <div class="nrb-date">
                                <strong>3</strong>
                                <p>
                                    августа
                                </p>
                                <span>
                                     Курс WIFI
                                </span>
                            </div>
                        </div>
                        <a href="https://mikrotik-training.ru/files/mikrotik-base-wifi.pdf" target="_blank" class="nrb-btn">Скачать презентацию</a>
                        <div class="nrb-close">x</div>
                    </div>
                </div>
                <a class="open-banner open-banner-right" data-timetoshow="<?php echo $currentBanner['timetoshow']; ?>" target="_blank" data-id="<?php echo $currentBanner['id']; ?>" href="#newBanner<?php echo $currentBanner['id']; ?>"></a>
            
            <?php } else if($currentBanner['type'] == "right2") { ?>
                <div id="newBanner<?php echo $currentBanner['id']; ?>" class="new-right-banner new-right-banner2">
                    <div>
                        <a href="<?php echo $currentBanner['url']; ?>">
                            <img src="<?php echo $currentBanner['bg']; ?>" alt="">
                        </a>
                        <div class="nrb-close">x</div>
                    </div>
                </div>
                <a class="open-banner open-banner-right" data-timetoshow="<?php echo $currentBanner['timetoshow']; ?>" target="_blank" data-id="<?php echo $currentBanner['id']; ?>" href="#newBanner<?php echo $currentBanner['id']; ?>"></a>
            <?php } else { ?>
                <div id="newBanner<?php echo $currentBanner['id']; ?>" data-global="<?php echo $currentBanner['global_options']; ?>" data-id="<?php echo $currentBanner['id']; ?>" class="hide-banner-content">
                    <div class="new-banner-content" style="background-image: url(<?php echo $currentBanner['bg']; ?>);">
                        <div class="nbc-date">
                            <?php echo $currentBanner['date']; ?>
                        </div>
                        <img src="<?php echo $currentBanner['title']; ?>" alt="" class="nbc-title">
                        <div class="nbc-text">
                            <?php echo $currentBanner['text']; ?>
                        </div>
                        <a href="<?php echo $currentBanner['url']; ?>" class="nbc-btn">
                            Подробнее
                        </a>
                    </div>
                </div>
                <a class="open-banner" data-timetoshow="<?php echo $currentBanner['timetoshow']; ?>" target="_blank" href="#newBanner<?php echo $currentBanner['id']; ?>"></a>
            <?php } ?>
        <?php } 
        }
    ?>
    
 