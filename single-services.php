<?php
get_header();
get_template_part('template-parts/breadcrumbs');
?>

<section class="single">
  <div class="container">
    <?php if (have_posts()) {
      while (have_posts()) {
        the_post(); ?>
        <?php $serviciframe = get_field('service-iframe'); ?>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-[22px] gap-x-0 sm:gap-x-[34px] xl:gap-x-[100px]">
          <div class="col-span-7">

            <?php
            get_template_part('template-parts/service-cat');
            ?>



            <div class="single__info">
              <?php
              // if (is_single('250')) {
              //   echo '<h2 class="simptom__title single__title">Чем помогаем?</h2>';
              // } else if (is_single('2094') || is_single('1322')) {
              //   echo '<h2 class="simptom__title single__title">Услуги</h2>';
              // } else if (is_single('2192')) {
              //   echo '<h2 class="simptom__title single__title">Показания</h2>';
              // } else {
              //   echo '<h2 class="simptom__title single__title">Симптомы</h2>';
              // } 
              ?>

              <!-- <p><?php the_field('simptoms'); ?></p> -->
              <div class="single-content mt-4">
                <?php echo carbon_get_the_post_meta('service_content'); ?>
              </div>
              <div class="flex flex-col sm:flex-row items-start sm:items-center gap-x-6 gap-y-4 mt-[22px] md:mt-[36px]">
                <button class="button single__button font-montserrat standart-trigger flex items-center justify-center h-[43px] xl:h-[48px] flex gap-x-2 justify-center items-center text-[15px] font-montserrat bg-[#00CCFF] rounded-[35px] text-white hover:opacity-[.9] px-[55px] xl:px-[64px]" data-page-name="<?php the_title(); ?>">
                  Записаться
                  <img src="<?= get_template_directory_uri() . '/img/subscribe/btn-icon.svg' ?>" alt="icon">
                </button>
                <a class=" text-[#001A34] hover:text-[#00CCFF] transition ease-linear duration-300 font-pt-700 text-2xl flex items-center gap-x-[11px] before:bg-[url('/wp-content/themes/neo/img/header/phone.svg')] before:w-[16px] before:h-[16px] before:bg-contain before:bg-no-repeat" href="tel:+78432452626">+7 (843) 205-09-96</a>
              </div>


            </div>
          </div>
          <div class="col-span-5">
            <div class="swiper service-slider">
              <div class="swiper-wrapper">

                <div class="swiper-slide service-slide bg-center bg-no-repeat bg-cover h-[234px] md:h-[374px] rounded-[12px]" style="background: url('<?= get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>') no-repeat center center/cover;"></div>

                <?php $items = carbon_get_the_post_meta('service_slider'); ?>
                <?php foreach ($items as $item) : ?>
                  <div class="swiper-slide service-slide bg-center bg-no-repeat bg-cover h-[234px] md:h-[374px] rounded-[12px]" style="background: url('<?php echo $item['service_slide_photo']; ?>') no-repeat center center/cover;">

                  </div>
                <?php endforeach; ?>
              </div>
              <div class="nav-arrow-left nav-arrow z-[1] transition ease-linear cursor-pointer absolute top-[50%] left-6 translate-Y-[-50%] w-[34px] h-[34px] rounded-full bg-[#00CCFF] flex justify-center items-center hover:opacity-[.9]"><img src="<?= get_template_directory_uri() . '/img/icons/left-arrow-white.svg' ?>" alt="icon"></div>
              <div class="nav-arrow-right nav-arrow z-[1] transition ease-linear cursor-pointer absolute top-[50%] right-6 translate-Y-[-50%] w-[34px] h-[34px] rounded-full bg-[#00CCFF] flex justify-center items-center hover:opacity-[.9]"><img src="<?= get_template_directory_uri() . '/img/icons/right-arrow-white.svg' ?>" alt="icon"></div>

            </div>
            <!--  <?php
                  if ($serviciframe) :
                    echo '<button class="button single__button button__green" onclick="$(`html, body`).animate({ scrollTop: $(`#request`).offset().top }, 500);">
                  Записаться на прием
              </button>';
                  endif;
                  if (!$serviciframe) :
                    echo '<button class="button single__button button__green request-trigger">
                  Записаться на прием
              </button>';
                  endif;
                  ?> -->
            <!-- Раскоментировать после карантина, а ниже закоментировать-->


          </div>
        </div>
      <?php }
    } else { ?>
      <p>Записей нет.</p>
    <?php } ?>
  </div>
</section>


<?php
if (carbon_get_the_post_meta('simptoms_repeat') || get_field('quest_name_1')) {
?>
  <div class="tabs services-tabs">

    <section class="simptom-tabs pb-0">
      <div class="container">
        <div class="simptom-tabs__list tabs-list flex flex-wrap gap-x-[14px] md:gap-x-[33px]">

          <!-- <div class="simptom-tabs__btn tab-active">
            <p class="tab simptom-tab">Об услуге</p>
          </div> -->

          <?php
          if (carbon_get_the_post_meta('simptoms_repeat')) {
          ?>
            <div class="simptom-tabs__btn tab__btn tab-active">
              <p class="tab simptom-tab"><?php echo carbon_get_the_post_meta('simptoms_tab'); ?></p>
            </div>
          <?php
          }
          ?>
          <?php if (get_field('quest_name_1')) : ?>
            <div class="simptom-tabs__btn tab__btn">
              <p class="tab simptom-tab">Вопрос-ответ</p>
            </div>
          <?php endif; ?>
          <?php
          $addTabs = carbon_get_the_post_meta('service_additional_tabs_list');
          if (!empty($addTabs)) {
            foreach ($addTabs as $tab) {
          ?>
              <div class="simptom-tabs__btn tab__btn">
                <p class="tab simptom-tab"><?= $tab['title'] ?></p>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </section>

    <?php
    if (carbon_get_the_post_meta('simptoms_repeat')) {
    ?>
      <div class="tab-content tab-active simptoms-content">
        <div class="container">
          <ul class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-[5px] sm:gap-[20px] lg:gap-[45px]">

            <?php $items = carbon_get_the_post_meta('simptoms_repeat'); ?>
            <?php foreach ($items as $item) : ?>
              <li class="text-center sm:px-4 rounded-[71px] bg-white simptoms-item text-[13px] sm:text-[18px] leading-[16px] sm:leading-[22px] flex justify-center items-center"><?php echo $item['simptoms_item_text']; ?></li>
            <?php endforeach; ?>

          </ul>
        </div>
      </div>
    <?php
    }
    ?>

    <?php
    if (!empty(get_field('quest_name_1'))) {
    ?>
      <div class="tab-content questions-content">
        <div class="container">
          <ul class="accordion__list">

            <?php if (get_field('quest_name_1')) : ?>
              <li class="accordion max-w-full md:max-w-[950px] py-[14px] md:py-[23px] border-b border-solid border-[#E7E7E7]">
                <button class="accordion__control justify-between flex w-full" aria-expanded="false">
                  <span class="accordion__title max-w-[555px] text-[16px] md:text-[18px] leading-[19px] md:leading-[34px] text-start pr-3"><?php the_field('quest_name_1'); ?></span>
                  <span class="accordion__icon min-w-[22px] w-[22px] h-[13px]"></span>
                </button>
                <div class="accordion__content pt-5" aria-hidden="true">
                  <p class="text-[15px] leading-[18px] md:leading-[25px] text-[#03243D80]"><?php the_field('quest_text_1'); ?></p>
                </div>
              </li>
            <?php endif; ?>
            <?php if (get_field('quest_name_2')) : ?>
              <li class="accordion max-w-full md:max-w-[950px] py-[14px] md:py-[23px] border-b border-solid border-[#E7E7E7]">
                <button class="accordion__control justify-between flex w-full" aria-expanded="false">
                  <span class="accordion__title max-w-[555px] text-[16px] md:text-[18px] leading-[19px] md:leading-[34px] text-start pr-3"><?php the_field('quest_name_2'); ?></span>
                  <span class="accordion__icon min-w-[22px] w-[22px] h-[13px]"></span>
                </button>
                <div class="accordion__content pt-5" aria-hidden="true">
                  <p class="text-[15px] leading-[18px] md:leading-[25px] text-[#03243D80]"><?php the_field('quest_text_2'); ?></p>
                </div>
              </li>
            <?php endif; ?>
            <?php if (get_field('quest_name_3')) : ?>
              <li class="accordion max-w-full md:max-w-[950px] py-[14px] md:py-[23px] border-b border-solid border-[#E7E7E7]">
                <button class="accordion__control justify-between flex w-full" aria-expanded="false">
                  <span class="accordion__title max-w-[555px] text-[16px] md:text-[18px] leading-[19px] md:leading-[34px] text-start pr-3"><?php the_field('quest_name_3'); ?></span>
                  <span class="accordion__icon min-w-[22px] w-[22px] h-[13px]"></span>
                </button>
                <div class="accordion__content pt-5" aria-hidden="true">
                  <p class="text-[15px] leading-[18px] md:leading-[25px] text-[#03243D80]"><?php the_field('quest_text_3'); ?></p>
                </div>
              </li>
            <?php endif; ?>
            <?php if (get_field('quest_name_4')) : ?>
              <li class="accordion max-w-full md:max-w-[950px] py-[14px] md:py-[23px] border-b border-solid border-[#E7E7E7]">
                <button class="accordion__control justify-between flex w-full" aria-expanded="false">
                  <span class="accordion__title max-w-[555px] text-[16px] md:text-[18px] leading-[19px] md:leading-[34px] text-start pr-3"><?php the_field('quest_name_4'); ?></span>
                  <span class="accordion__icon min-w-[22px] w-[22px] h-[13px]"></span>
                </button>
                <div class="accordion__content pt-5" aria-hidden="true">
                  <p class="text-[15px] leading-[18px] md:leading-[25px] text-[#03243D80]"><?php the_field('quest_text_4'); ?></p>
                </div>
              </li>
            <?php endif; ?>
            <?php if (get_field('quest_name_5')) : ?>
              <li class="accordion max-w-full md:max-w-[950px] py-[14px] md:py-[23px] border-b border-solid border-[#E7E7E7]">
                <button class="accordion__control justify-between flex w-full" aria-expanded="false">
                  <span class="accordion__title max-w-[555px] text-[16px] md:text-[18px] leading-[19px] md:leading-[34px] text-start pr-3"><?php the_field('quest_name_5'); ?></span>
                  <span class="accordion__icon min-w-[22px] w-[22px] h-[13px]"></span>
                </button>
                <div class="accordion__content pt-5" aria-hidden="true">
                  <p class="text-[15px] leading-[18px] md:leading-[25px] text-[#03243D80]"><?php the_field('quest_text_5'); ?></p>
                </div>
              </li>
            <?php endif; ?>

          </ul>
        </div>
      </div>
    <?php
    }
    ?>

    <?php
    if (!empty($addTabs)) {
      foreach ($addTabs as $tab) {
    ?>
        <div class="tab-content simptoms-content">
          <div class="container">
            <?= wpautop($tab['text']) ?>
          </div>
        </div>
    <?php
      }
    }
    ?>
  </div>

<?php
}
?>


<?php
$priceTableService = get_field("price-table-service");
if ($priceTableService && is_single('2091')) {
?>

  <section>
    <div class="container">
      <div class="simptom__text service-prices">
        <?php
        if (is_single('2091')) {
          echo '<div class="col-12 col-lg-12">' . get_field("price-table-service") . '</div>';
        };
        ?>
      </div>
    </div>
  </section>
<?php
}
?>


<?php
if (carbon_get_the_post_meta('video_slider')) {
?>
  <section class="video-sect">
    <div class="container">
      <div class="s-adv__title title text-[#03243D] font-pt-700 text-[24px] sm:text-[32px] leading-[32px] sm:leading-[43px] mb-5 md:mb-7">Видео об услуге</div>

      <div class="swiper video-services">
        <div class="swiper-wrapper">

          <?php $items = carbon_get_the_post_meta('video_slider'); ?>
          <?php foreach ($items as $item) : ?>
                <div class="swiper-slide video-slide">
                  <!-- <video class="video-js w-full h-[190px] md:h-[293px] rounded-[12px] overflow-hidden bg-[#F8F9FB]" controls preload="auto" poster="<?php echo $item['video_photo']; ?>" data-setup='{}'>
                    <source src="<?php echo $item['video_video']; ?>" type="video/mp4">
                    </source>
                    <source src="<?php echo $item['video_video']; ?>" type="video/webm">
                    </source>
                    <source src="<?php echo $item['video_video']; ?>" type="video/ogg">
                    </source>
                    <p class="vjs-no-js">
                      To view this video please enable JavaScript, and consider upgrading to a
                      web browser that
                      <a href="https://videojs.com/html5-video-support/" target="_blank">
                        supports HTML5 video
                      </a>
                    </p>
                  </video> -->
                  <a href="<?= $item["video_src"] ?>" data-fancybox class="video__wrapper video__wrapper-btn w-full h-[190px] md:h-[293px] rounded-[12px] overflow-hidden bg-[#F8F9FB]">
                    <img src="<?= $item["video_preview"] ?>" alt="image" style="width:100%;height:100%;object-fit:cover;">
                    <button class="video__btn"></button>
                  </a>


                  <div class="font-pt-700 text-[20px] leading-[24px] mt-3"><?php echo $item['video_descr']; ?></div>
                </div>
          <?php endforeach; ?>

        </div>
        <div class="swiper-pagination justify-center relative mt-12 flex"></div>
      </div>

    </div>
  </section>
<?php
}
?>


<?php if (get_field('develop_descr')) : ?>
  <section class="develop">
    <div class="container">
      <div class="develop__title title video-title-service text-[#03243D] font-pt-700 text-[24px] sm:text-[32px] leading-[32px] sm:leading-[43px] mb-5 md:mb-7">Развитие</div>
      <img class="mb-4" src="<?= get_template_directory_uri() . '/img/razv.png' ?>" alt="image">
      <p class="develop__descr text-[18px] md:text-[22px] font-pt-500 leading-[22px] md:leading-[26px] mb-[25px]">
        <?php the_field('develop_descr'); ?>
      </p>
      <div class="production__slider-wrapper">
        <div class="swiper production__slider">
          <div class="swiper-scrollbar-wrap"></div>
          <div class="scrollbar-nums grid" style="grid-template-columns: repeat(<?php the_field('scrollbar_cols'); ?>, 1fr);">
            <?php if (get_field('develop_text1')) : ?>
              <div class="num col-span-4">
                <div class="num__num md:text-[58px] text-[24px] leading-[28px] md:leading-[78px] text-[#00CCFF]">1</div>
                <div class="num__text"><?php the_field('scrollbar_type'); ?></div>
              </div>
            <?php endif; ?>
            <?php if (get_field('develop_text2')) : ?>
              <div class="num col-span-4">
                <div class="num__num md:text-[58px] text-[24px] leading-[28px] md:leading-[78px] text-[#00CCFF]">2</div>
                <div class="num__text"><?php the_field('scrollbar_type'); ?></div>
              </div>
            <?php endif; ?>
            <?php if (get_field('develop_text3')) : ?>
              <div class="num col-span-4">
                <div class="num__num md:text-[58px] text-[24px] leading-[28px] md:leading-[78px] text-[#00CCFF]">3</div>
                <div class="num__text"><?php the_field('scrollbar_type'); ?></div>
              </div>
            <?php endif; ?>
            <?php if (get_field('develop_text4')) : ?>
              <div class="num col-span-4">
                <div class="num__num md:text-[58px] text-[24px] leading-[28px] md:leading-[78px] text-[#00CCFF]">4</div>
                <div class="num__text"><?php the_field('scrollbar_type'); ?></div>
              </div>
            <?php endif; ?>
            <?php if (get_field('develop_text5')) : ?>
              <div class="num col-span-4">
                <div class="num__num md:text-[58px] text-[24px] leading-[28px] md:leading-[78px] text-[#00CCFF]">5</div>
                <div class="num__text"><?php the_field('scrollbar_type'); ?></div>
              </div>
            <?php endif; ?>
            <?php if (get_field('develop_text6')) : ?>
              <div class="num col-span-4">
                <div class="num__num md:text-[58px] text-[24px] leading-[28px] md:leading-[78px] text-[#00CCFF]">6</div>
                <div class="num__text"><?php the_field('scrollbar_type'); ?></div>
              </div>
            <?php endif; ?>
            <?php if (get_field('develop_text7')) : ?>
              <div class="num col-span-4">
                <div class="num__num md:text-[58px] text-[24px] leading-[28px] md:leading-[78px] text-[#00CCFF]">7</div>
                <div class="num__text"><?php the_field('scrollbar_type'); ?></div>
              </div>
            <?php endif; ?>
            <?php if (get_field('develop_text8')) : ?>
              <div class="num col-span-4">
                <div class="num__num md:text-[58px] text-[24px] leading-[28px] md:leading-[78px] text-[#00CCFF]">8</div>
                <div class="num__num md:text-[58px] text-[24px] leading-[28px] md:leading-[78px] text-[#00CCFF]">8</div>
                <div class="num__text"><?php the_field('scrollbar_type'); ?></div>
              </div>
            <?php endif; ?>
          </div>
          <div class="swiper-wrapper">
            <?php if (get_field('develop_text1')) : ?>
              <div class="swiper-slide production__slide">
                <div class="production__slide-wrapper">
                  <div class="production__slide-left">
                    <div class="production__slide-card production-card">
                      <p class="production-card__text max-w-[320px] text-[15px] leading-[18px]">
                        <?php the_field('develop_text1'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            <?php if (get_field('develop_text2')) : ?>
              <div class="swiper-slide production__slide">
                <div class="production__slide-wrapper">
                  <div class="production__slide-left">
                    <div class="production__slide-card production-card">
                      <p class="production-card__text max-w-[320px] text-[15px] leading-[18px]">
                        <?php the_field('develop_text2'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            <?php if (get_field('develop_text3')) : ?>
              <div class="swiper-slide production__slide">
                <div class="production__slide-wrapper">
                  <div class="production__slide-left">
                    <div class="production__slide-card production-card">
                      <p class="production-card__text max-w-[320px] text-[15px] leading-[18px]">
                        <?php the_field('develop_text3'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            <?php if (get_field('develop_text4')) : ?>
              <div class="swiper-slide production__slide">
                <div class="production__slide-wrapper">
                  <div class="production__slide-left">
                    <div class="production__slide-card production-card">
                      <p class="production-card__text max-w-[320px] text-[15px] leading-[18px]">
                        <?php the_field('develop_text4'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            <?php if (get_field('develop_text5')) : ?>
              <div class="swiper-slide production__slide">
                <div class="production__slide-wrapper">
                  <div class="production__slide-left">
                    <div class="production__slide-card production-card">
                      <p class="production-card__text max-w-[320px] text-[15px] leading-[18px]">
                        <?php the_field('develop_text5'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            <?php if (get_field('develop_text6')) : ?>
              <div class="swiper-slide production__slide">
                <div class="production__slide-wrapper">
                  <div class="production__slide-left">
                    <div class="production__slide-card production-card">
                      <p class="production-card__text max-w-[320px] text-[15px] leading-[18px]">
                        <?php the_field('develop_text6'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

    </div>
  </section>
<?php endif; ?>

<?php if (in_category('services') && (!in_category(174))) { ?>
  <section class="s-adv bg-[#F8F9FB]">
    <div class="container">
      <div class="s-adv__title title text-[#03243D] font-pt-700 text-[24px] sm:text-[32px] leading-[32px] sm:leading-[43px] mb-5 md:mb-7">Преимущества лечения в клинике НЭО</div>

      <div class="grid grid-cols-1 sm:grid-cols-3 xl:grid-cols-6 gap-x-[20px] 2xl:gap-x-[60px] gap-y-7">
        <div class="col-md-4 col-sm-6">
          <div class="s-adv__body flex flex-row sm:flex-col gap-x-5 items-center sm:items-start">
            <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri()) ?>/img/neo-03.svg" alt="Комплексная неврологическая помощь" class="s-adv__img w-[57px] sm:mx-auto mb-0 sm:mb-[15px]">
            <p class="s-adv__txt text-start sm:text-center">
              Комплексная неврологическая помощь детям с рождения и взрослым
            </p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="s-adv__body flex flex-row sm:flex-col gap-x-5 items-center sm:items-start">
            <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri()) ?>/img/recovery.svg" alt="Современные методы лечения" class="s-adv__img w-[57px] sm:mx-auto mb-0 sm:mb-[15px]">
            <p class="s-adv__txt text-start sm:text-center">
              Современные методы лечения задержек развития
            </p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="s-adv__body flex flex-row sm:flex-col gap-x-5 items-center sm:items-start">
            <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri()) ?>/img/doctor.svg" alt="Врачи высшей категории" class="s-adv__img w-[57px] sm:mx-auto mb-0 sm:mb-[15px]">
            <p class="s-adv__txt text-start sm:text-center">
              Врачи высшей категории с многолетним опытом работы
            </p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="s-adv__body flex flex-row sm:flex-col gap-x-5 items-center sm:items-start">
            <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri()) ?>/img/neo-02.svg" alt="Диагностика" class="s-adv__img w-[57px] sm:mx-auto mb-0 sm:mb-[15px]">
            <p class="s-adv__txt text-start sm:text-center">
              Диагностика на оборудовании экспертного класса
            </p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="s-adv__body flex flex-row sm:flex-col gap-x-5 items-center sm:items-start">
            <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri()) ?>/img/diagnosis.svg" alt="Индивидуальные программы реабилитации" class="s-adv__img w-[57px] sm:mx-auto mb-0 sm:mb-[15px]">
            <p class="s-adv__txt text-start sm:text-center">
              Индивидуальные программы реабилитации
            </p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="s-adv__body flex flex-row sm:flex-col gap-x-5 items-center sm:items-start">
            <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri()) ?>/img/clinic.svg" alt="Сертифицированные товары" class="s-adv__img w-[57px] sm:mx-auto mb-0 sm:mb-[15px]">
            <p class="s-adv__txt text-start sm:text-center">
              Клиническая база кафедры детской неврологии
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>

<section class="stocks-sect">
  <div class="container">
    <div class="flex justify-between items-center mb-5 md:mb-7">
      <h2 class="specialists__title title text-[#03243D] font-pt-700 text-[24px] sm:text-[32px] leading-[32px] sm:leading-[43px]">Акции</h2>
      <div class="flex gap-x-[45px] navigation-stocks-services justify-center">
        <div class="items-center justify-center w-[48px] h-[48px] hidden md:flex nav-arrow-left rounded-full border border-[#00CCFF]"><img src="<?= get_template_directory_uri() . '/img/icons/left-arrow.svg' ?>" alt="icon"></div>
        <div class="items-center justify-center w-[48px] h-[48px] hidden md:flex nav-arrow-right rounded-full border border-[#00CCFF]"><img src="<?= get_template_directory_uri() . '/img/icons/right-arrow.svg' ?>" alt="icon"></div>
      </div>
    </div>
    <div class="swiper stocks-serv-slider">
      <div class="swiper-wrapper">
        <?php
        // параметры по умолчанию
        $posts = get_posts(array(
          'numberposts' => 6,
          'category_name'    => 'action',
          'order'       => 'ASC',
          'post_type'   => 'post',
          'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ));

        foreach ($posts as $post) {
          setup_postdata($post);
        ?>
          <div class="swiper-slide stocks-serv-slide flex flex-col xl:flex-row gap-y-4 gap-x-7">
            <a href="<?php the_permalink(); ?>">
              <img class="h-[293px] w-full xl:w-[369px] min-w-unset sm:min-w-[369px] object-cover rounded-[12px] transition ease-linear hover:opacity-[.9]" src="<?php the_post_thumbnail_url('medium'); ?>" alt="image">
            </a>
            <div class="flex flex-col gap-y-3 pt-1">
              <a class="specialists__name card__name block text-[#03243D] font-pt-700 text-[20px] lg:text-[22px] leading-[24px] lg:leading-[26px]" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <p class="text-[15px] leading-[18px] card-title h-[52px] overflow-hidden"><?php echo get_the_excerpt(); ?></p>
              <a class="text-[#00CCFF] transition ease-linear" href="<?php the_permalink(); ?>">Подробнее</a>

            </div>
          </div>
        <?php
        }
        wp_reset_postdata(); // сброс
        ?>

      </div>
      <div class="swiper-pagination justify-center relative mt-12 flex md:hidden"></div>
    </div>

  </div>
</section>



<?php
$hidespec = get_field('hide-specialists');
$vipSpec = get_field('vip-spec');
$standartSpec = get_field('standart-spec');
if (!$vipSpec) :
  $vipSpec = 1;
endif;
if (!$standartSpec) :
  $standartSpec = 1;
endif;
?>

<?php
$pricetable = get_field('price-table-service');
if ($pricetable && !is_single('2091')) :
  echo '<section class="service-prices pt-0 pb-0">
    <div class="container"><h2 class="specialists__title title text-[#03243D] font-pt-700 text-[24px] sm:text-[32px] leading-[32px] sm:leading-[43px] mb-3 sm:mb-7">Цены на услуги</h2>
    <div class="single__info single__table">
    ' . get_field("price-table-service") . '
    </div>
    </div>
    </section>';
endif;
?>


<?php if ($hidespec != 1) : ?>

  <section class="specialists">
    <div class="container<?php
                          if ($hidespec || $standartSpec == 1 && $vipSpec == 1) :
                            echo ' hide-block';
                          endif; ?>">

      <div class="flex justify-between items-center mb-5 md:mb-7">
        <h2 class="specialists__title title text-[#03243D] font-pt-700 text-[24px] sm:text-[32px] leading-[32px] sm:leading-[43px]">Специалисты</h2>
        <div class="flex gap-x-[45px] navigation-main-specs justify-center">
          <div class="items-center justify-center w-[48px] h-[48px] hidden md:flex nav-arrow-left rounded-full border border-[#00CCFF]"><img src="<?= get_template_directory_uri() . '/img/icons/left-arrow.svg' ?>" alt="icon"></div>
          <div class="items-center justify-center w-[48px] h-[48px] hidden md:flex nav-arrow-right rounded-full border border-[#00CCFF]"><img src="<?= get_template_directory_uri() . '/img/icons/right-arrow.svg' ?>" alt="icon"></div>
        </div>

      </div>
      <div class="specialists-slider swiper">
        <div class="swiper-wrapper">


          <?php
          // параметры по умолчанию
          $posts = get_posts(array(
            'include'    => $vipSpec,
            'order'       => 'ASC',
            'orderby'  => 'post__in',
            'post_type'   => 'post',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
          ));
          foreach ($posts as $post) {
            setup_postdata($post);
          ?>
            <div class="specialists-slide swiper-slide h-auto">
              <div class="specialists__card card specialists__card--vip card h-full">
                <a href="<?php the_permalink(); ?>" class="specialists__image card__image h-[420px] bg-cover bg-top hover:opacity-[.9] rounded-[12px]" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">

                </a>
                <div class="flex flex-col justify-between min-h-[260px] lg:min-h-[313px] xl:min-h-[286px]">
                  <div class="block">
                    <a class="specialists__name card__name block mt-5 text-[#03243D] font-pt-700 text-[20px] lg:text-[22px] leading-[24px] lg:leading-[26px] mb-1" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <span class="block mt-5 text-[#03243D75] mb-3 font-pt-500 text-[15px] leading-[19px]"><?= get_field('position-one'); ?></span>

                    <span class="block text-[#03243D75] mb-2 text-[15px] leading-[24px]">Стаж <?= get_field('experience-years'); ?></span>
                    <?php the_field('work_price'); ?>
                    <?php the_field('work_price--sale'); ?>
                  </div>
                  <div class="flex justify-between mt-[30px]">
                    <?php $specmodal = get_field('master-popups-spec'); ?>
                    <?php $hiderequest = get_field('hiderequest'); ?>
                    <?php
                    if ($specmodal && !$hiderequest) :
                      echo '<button class="button speicalists__button card__button button__green button__green h-[43px] xl:h-[48px] flex justify-center items-center text-[15px] font-montserrat bg-[#00CCFF] rounded-[35px] text-white hover:opacity-[.9] px-[27px] lg:px-[32px] xl:px-[42px] ' . get_field('master-popups-spec') . '">Записаться</button>';
                    endif;
                    if (!$specmodal || $hiderequest) :
                      echo '<button class="button speicalists__button card__button button__green request-trigger h-[43px] xl:h-[48px] flex justify-center items-center text-[15px] font-montserrat bg-[#00CCFF] rounded-[35px] text-white hover:opacity-[.9] px-[27px] lg:px-[32px] xl:px-[42px]">Записаться</button>';
                    endif;
                    ?>
                    <a class="h-[43px] xl:h-[48px] flex justify-center items-center bg-white rounded-[35px] font-montserrat text-[15px] text-[#00CCFF] hover:opacity-[.9] px-[27px] lg:px-[32px] xl:px-[42px] card__button border border-[#00CCFF] hover:bg-[#00CCFF] hover:text-white transition ease-linear" href="<?php the_permalink(); ?>">Подробнее</a>
                  </div>
                </div>



                <!-- Раскоментировать после карантина, а ниже закоментировать-->
                <!-- <button class="button speicalists__button card__button button__green request-trigger" data-page-name="<?php the_title(); ?>">Записаться на прием</button>                -->
              </div>
            </div>

          <?php
          }

          wp_reset_postdata(); // сброс
          ?>

          <?php
          $posts = get_posts(array(
            'include'    => $standartSpec,
            'order'       => 'ASC',
            'post_type'   => 'post',
            'orderby'  => 'post__in',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
          ));
          foreach ($posts as $post) {
            setup_postdata($post);
          ?>
            <div class="specialists-slide swiper-slide h-auto">
              <div class="specialists__card card h-full">
                <a href="<?php the_permalink(); ?>" class="specialists__image card__image h-[420px] bg-cover bg-top hover:opacity-[.9] rounded-[12px]" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">

                </a>
                <div class="flex flex-col justify-between min-h-[260px] lg:min-h-[313px] xl:min-h-[286px]">
                  <div class="block">
                    <a class="specialists__name mt-5 card__name block text-[#03243D] font-pt-700 text-[20px] lg:text-[22px] leading-[24px] lg:leading-[26px] mb-1" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <span class="block mt-5 text-[#03243D75] mb-3 font-pt-500 text-[15px] leading-[19px]"><?= get_field('position-one'); ?></span>
                    <span class="block text-[#03243D75] mb-2 text-[15px] leading-[24px]">Стаж <?= get_field('experience-years'); ?></span>
                    <?php the_field('work_price'); ?>
                  </div>
                  <div class="flex justify-between mt-[30px]">
                    <?php $specmodal = get_field('master-popups-spec'); ?>
                    <?php $hiderequest = get_field('hiderequest'); ?>
                    <?php
                    if ($specmodal && !$hiderequest) :
                      echo '<button class="button speicalists__button card__button button__green h-[43px] xl:h-[48px] flex justify-center items-center text-[15px] font-montserrat bg-[#00CCFF] rounded-[35px] text-white hover:opacity-[.9] px-[27px] lg:px-[32px] xl:px-[42px] ' . get_field('master-popups-spec') . '">Записаться</button>';
                    endif;
                    if (!$specmodal || $hiderequest) :
                      echo '<button class="button speicalists__button card__button button__green request-trigger h-[43px] xl:h-[48px] flex justify-center items-center text-[15px] font-montserrat bg-[#00CCFF] rounded-[35px] text-white hover:opacity-[.9] px-[27px] lg:px-[32px] xl:px-[42px]">Записаться</button>';
                    endif;
                    ?>
                    <a class="h-[43px] xl:h-[48px] flex justify-center items-center bg-white rounded-[35px] font-montserrat text-[15px] text-[#00CCFF] hover:opacity-[.9] px-[27px] lg:px-[32px] xl:px-[42px] card__button border border-[#00CCFF] hover:bg-[#00CCFF] hover:text-white transition ease-linear" href="<?php the_permalink(); ?>">Подробнее</a>
                  </div>
                </div>


                <!-- Раскоментировать после карантина, а ниже закоментировать-->
                <!-- <button class="button speicalists__button card__button button__green request-trigger" data-page-name="<?php the_title(); ?>">Записаться на прием</button>   -->
              </div>
            </div>

          <?php
          }

          wp_reset_postdata(); // сброс
          ?>

        </div>
        <div class="swiper-pagination justify-center relative mt-12 flex md:hidden"></div>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php
$dopServices = get_field('dop-services');

if ($dopServices) {
?>
  <section class="specialists bg-[#F8F9FB]">
    <div class="container">
      <div class="specialists__title title text-[#03243D] font-pt-700 text-[24px] sm:text-[32px] leading-[32px] sm:leading-[43px] mb-5 md:mb-7">Вам также может помочь</div>
      <div class="specialists-dop-slider owl-carousel owl-theme">
        <?php
        $posts = get_posts(array(
          'include'    => $dopServices,
          'order'       => 'ASC',
          'post_type'   => 'post',
          'orderby'  => 'post__in',
          'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ));
        foreach ($posts as $post) {
          setup_postdata($post);
        ?>
          <div class="specialists-slide h-auto">
            <div class="services__card card dop__card">
              <a href="<?php the_permalink(); ?>" class="services__image card__image h-[306px] bg-cover bg-top hover:opacity-[.9] rounded-[12px] mb-5" style="background: url('<?php the_post_thumbnail_url(); ?>') center center/cover;">

              </a>
              <a class="specialists__name card__name block card-title h-auto sm:h-[52px] line-clamp-2 overflow-hidden text-[#03243D] font-pt-700 text-[20px] lg:text-[22px] leading-[24px] lg:leading-[26px] mb-[9px] md:mb-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <div class="card-descr overflow-hidden h-[109px]">
                <?php the_excerpt(); ?>
              </div>


              <!--  <?php
                    if ($serviciframe) :
                      echo '<div class="services__wrap">
                  <a href="' . get_permalink() . '" class="button button__white services__button card__button">Подробнее</a>
                  <button class="button button__green services__button card__button mpp-trigger-popup ' . get_field("master-popups-services") . '">Записаться</button>
                </div>';
                    endif;
                    if (!$serviciframe) :
                      echo '<div class="services__wrap">
                  <a href="' . get_permalink() . '" class="button button__white services__button card__button">Подробнее</a>
                  <button class="button button__green services__button card__button request-trigger">Записаться</button>
                </div>';
                    endif;
                    ?> -->
              <!-- Раскоментировать после карантина, а ниже закоментировать-->
              <div class="services__wrap flex justify-between mt-[30px]">
                <a href="<?php the_permalink(); ?>" class="button services__button card__button h-[43px] xl:h-[48px] flex justify-center items-center bg-white rounded-[35px] font-montserrat text-[15px] text-[#00CCFF] hover:opacity-[.9] px-[27px] lg:px-[32px] xl:px-[42px] card__button border border-[#00CCFF] hover:bg-[#00CCFF] hover:text-white transition ease-linear">Подробнее</a>
                <button class="button button__green services__button card__button request-trigger h-[43px] xl:h-[48px] flex justify-center items-center text-[15px] font-montserrat bg-[#00CCFF] rounded-[35px] text-white hover:opacity-[.9] px-[27px] lg:px-[32px] xl:px-[42px]" data-page-name="<?php the_title(); ?>">Записаться</button>
              </div>
            </div>
          </div>

        <?php
        }

        wp_reset_postdata(); // сброс
        ?>

      </div>
    </div>
  </section>

<?
}
?>
<!-- <?php
      if ($serviciframe) :
        echo '<section class="request" id="request">
                  <div class="request__bg">
                    <div class="container">
                      <h2 class="request__title title">Запись на прием</h2>
                      <div class="request__wrap">
                      ' . get_field("service-iframe") . '
                      </div>
                    </div>
                  </div>
                </section>';
      endif;
      ?>
                 <?php
                  if (!$serviciframe) :
                    echo '<section class="request" id="request">
                  <div class="request__bg">
                    <div class="container">
                      <h2 class="request__title title">Запись на прием</h2>
                      <div class="request__wrap request__form-card">
                      <h3 сlass="request__form-title subscribe__col-title" id="subscribe__col-title">Оставьте контакты и мы вам перезвоним</h3>
                      ' . do_shortcode('[contact-form-7 id="2381" title="Запись на прием"]') . '
                      </div>
                    </div>
                  </div>
                </section>';
                  endif;
                  ?> -->

<!-- Раскоментировать после карантина, а ниже закоментировать-->
<section class="request" id="request">
  <div class="request__bg">
    <div class="container">
      <h2 class="title text-[#03243D] font-pt-700 text-[24px] sm:text-[32px] leading-[32px] sm:leading-[43px] mb-5 md:mb-7">Запись на приём</h2>
      <div class="subscribe-wrapper">
        <?php echo do_shortcode('[contact-form-7 id="2381" title="Запись на прием"]') ?>
      </div>
    </div>
  </div>
</section>

<section class="single__info content">
  <div class="container">
    <?php the_content(); ?>
  </div>
</section>



<?php
get_footer();
