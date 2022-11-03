window.onload = function () {
  setTimeout(() => {
    document.body.classList.add('ready');   //технический класс для начала анимации всякого разного
  }, 500);
}

$(document).ready(function (e) {

  var products = {}; //массив товаров, который пихаем в письмо
  var basketQty = 0; //кол-во товаров к корзине
  var basketSum = 0; //сумма в рублях в корзине


  // бургер
  $(".burger").click(function (e) {             //клик по бургеру
    $('#burger-modal').toggleClass('active');   //открываем модалку бургера (затемнение)
    $('.burger__menu').toggleClass('active');   //открываем модалку бургера (меню)
    $('.burger__btn').toggleClass('active');    //бургер в крестик и назад
    $('body').toggleClass('fixed');             //фиксируем body от прокрутки
  });

  // корзина в шапке
  let cookies = Cookies.get();                                //получаем массив куки
  // console.log(cookies);
  // console.log('======');
  $.each(cookies, function (key, value) {                     //перебираем массив куки
    if (key.startsWith('i')                                   //куки должны начинаться с "i" и не должны быть равны нулю
      && value != 0
      && value != '0'
      && value != 'NaN'
      && value != 'undefined'
      && value != null) {
      // console.log(key + ' = ' + value);
      basketQty = basketQty + 1;                               //прибавляем 1 к количеству товаров в корзине
      // console.log('basketQty: ' + basketQty);
      $('#basket-qty').text(basketQty);                        //вставляем новое кол-во товаров в иконку корзины в шапке сайта
      $('.basket__footer-qty--sum').text(basketQty);           //вставляем новое кол-во товаров в футер модалки корзины
      $('.basket-slider--empty').addClass('deactive');         //т.к. корзина больше не пустая - убираем надпись "добавь товары"
    }
    else {
      // $('#basket-qty').text(0);
      // $('.basket__footer-qty--sum').text(0);
      // $('.basket-slider--empty').removeClass('deactive');
    }
  });


  // кнопки количества товара в корзину
  if ($(".item-buttons")) {                                     //проверяем существуют ли на странице кнопки
    $(".item-buttons__btn--minus").click(function (e) {         //при клике на кнопку "минус"
      let id = $(this).attr("id").replace(/[^0-9]/gi, '');      //получаем ID товара в числовом видел
      let num = $('#item-num-' + id).val();                     //получаем кол-во нужного товара из input
      if (num != 0) {                                           //если кол-во товара НЕ равно нулю
        $('#item-num-' + id).val(--num);                        //то делаем минус один
      }
    });

    $(".item-buttons__btn--plus").click(function (e) {          //при клике на кнопку "плюс"
      let id = $(this).attr("id").replace(/[^0-9]/gi, '');      //получаем ID товара в числовом видел
      let num = $('#item-num-' + id).val();                     //получаем кол-во нужного товара из input
      $('#item-num-' + id).val(++num);                          //то прибавляем один
    });

    $(".item-buttons__btn-buy").click(function (e) {            //при клике на кнопку "в корзину"
      let id = $(this).attr("id").replace(/[^0-9]/gi, '');      //получаем ID товара в числовом видел
      let num = $('#item-num-' + id).val();                     //получаем кол-во нужного товара из input
      if (num != 0) {                                           //если кол-во товара НЕ равно нулю

        let span = $('.item-buttons__numblock-span-' + id);     //по ID получаем объект span с надписью "добаивли"
        span.addClass('active');                                //добвляем класс active для анимации

        setTimeout(function (e) {                               //через 1,5 сек
          span.removeClass('active')                            //убираем класс active для анимации
          $('#item-num-' + id).val(0);                          //обнуляем кол-во товаров в карточке
        }, 1500);

        let qty = Cookies.get('id-' + id);                      //получаем свежие куки товара по ID
        // console.log('старые куки: ' + qty);

        if (qty == 0                                            //куки не должны быть равны нулю
          || qty == 'NaN'
          || qty == 'undefined'
          || qty == null
          || qty == '0') {
          // console.log('куки равны нулю');
          // console.log('устанавливаем куки: ' + num);
          Cookies.set('id-' + id, num);                         //записываем новое кол-во товара в куки
          // console.log(document.cookie);
          // console.log("-----------------");
          basketQty = basketQty + 1;                            //увеличиваем кол-во товара в корзине на один
          $('#basket-qty').text(basketQty);                     //вставляем новое кол-во товаров в иконку корзины в шапке сайта
          $('.basket__footer-qty--sum').text(basketQty);        //вставляем новое кол-во товаров в футер модалки корзины
          $('.basket-slider--empty').addClass('deactive');      //т.к. корзина больше не пустая - убираем надпись "добавь товары"
        }
        else {                                                  //если куки товара уже были ранее записаны
          if (num != 0) {
            let qty = Cookies.get('id-' + id);                  //получаем свежие куки товара по ID
            // console.log('куки НЕ равны нулю');
            // console.log('qty: ' + qty);
            // console.log('num: ' + num);
            qty = parseInt(qty) + parseInt(num);                //прибавляем кол-во товара из куки с кол-вом из карточки товара
            // console.log('устанавливаем новые куки: ' + qty);
            Cookies.set('id-' + id, qty);                       //записываем новое кол-во товара в куки
            // console.log(document.cookie);              
            // console.log("-----------------");
          }
        }
      }
    });
  }

  // корзина 
  $('#basket-btn').click(function (e) {
    $('#basket-modal').addClass('active');
    let cookies = Cookies.get();
    // console.log(cookies);
    // console.log('======');
    basketSum = 0;
    $('.basket__footer-sum--sum').text(basketSum);
    products = {};
    $.each(cookies, function (key, value) {
      if (key.startsWith('i') && value != 0 && value != '0') {
        // console.log('id: ' + key + ' = ' + value);

        $.ajax({
          url: 'https://' + window.location.hostname + '/catalog/basket.php?id=' + key + '&value=' + value,
          success: function (data) {
            data = JSON.parse(data);
            var
              productNAME = data.NAME,
              productPRICE = data.PRICE,
              productDESC = data.DESC,
              productPICURL = data.PICURL;

            products[key] = {
              'name': productNAME,
              'price': productPRICE,
              'value': value
            };
            // console.log(products);

            // $.each(products, function (k, d) {
            //   if (d['value'] > 0) {
            //     console.log(d['name'] + '; цена = ' + d['price'] + '; кол-во = ' + d['value']);
            //   }
            // });

            $('.basket-slider').append('<div class="basket-slider__item" id="slider__item-' + key + '">\
                <div class="basket-slider__close" id="basket-item-close-' + key + '">\
                  <span></span>\
                  <span></span>\
                </div>\
                <div class="basket-slider__cover">\
                    <img class="basket-slider__img" src="' + productPICURL + '">\
                  <div class="item-buttons__numblock">\
                    <button class="item-buttons__btn item-buttons__btn--minus" id="basket-item-minus-' + key + '"><i class="fas fa-minus"></i></button>\
                    <input class="item-buttons__number" name="item-buttons__number" readonly type="number" id="basket-item-num-' + key + '" value="' + value + '" min="0" max="999" oninput="validity.valid||(value=\'\');">\
                    <button class="item-buttons__btn item-buttons__btn--plus" id="basket-item-plus-' + key + '"><i class="fas fa-plus"></i></button>\
                  </div>\
                </div>\
                <div class="basket-slider__desc">\
                  <div class="basket-slider__desc-title">' + productNAME + '</div>\
                  <div class="basket-slider__desc-text">' + productDESC + '</div>\
                  <div class="basket-slider__desc-price">\
                    <div class="basket-slider__desc-price-calc">\
                      <span id="basket-item-calc-' + key + '">' + value + '</span>x<span id="basket-item-price-' + key + '">' + productPRICE + '</span>\
                    </div>\
                    <div class="basket-slider__desc-price-sum">\
                      <span class="basket-item-sum" id="basket-item-sum-' + key + '"></span><span>&#8381</span>\
                    </div>\
                  </div>\
                </div>\
              </div>\
        ');
            // let price = $("#basket-item-price-" + key + "").text().replace(/[^0-9]/gi, '');
            var itemSum = parseInt(productPRICE) * parseInt(value);
            $("#basket-item-sum-" + key + "").text(itemSum);
            basketSum = parseInt(basketSum) + parseInt(itemSum);

            // кнопка удаления товара из корзины
            $('#basket-item-close-' + key).click(function (e) {
              $('#slider__item-' + key).remove();
              Cookies.set(key, '0'); //удаляем куки
              // console.log('удалили ' + key);

              basketQty = basketQty - 1;
              $('#basket-qty').text(basketQty);
              $('.basket__footer-qty--sum').text(basketQty);
              if (basketQty == 0 || basketQty == '0') {
                $('.basket-slider--empty').removeClass('deactive');
              }
              basketSum = parseInt(basketSum) - parseInt(itemSum);
              // console.log('itemSum: ' + itemSum);
              // console.log('basketSum: ' + basketSum);
              $(".basket__footer-sum--sum").text(basketSum);

              products[key] = {
                'name': productNAME,
                'price': productPRICE,
                'value': 0
              };
              // console.log(products);
            });

            // изменение кол-ва товара в корзине
            $('#basket-item-minus-' + key).click(function (e) {
              let num = $('#basket-item-num-' + key).val();
              if (num > 1) {
                $('#basket-item-num-' + key).val(--num);
                $('#basket-item-calc-' + key).text(num);
                Cookies.set(key, num);
                // console.log(document.cookie);

                price = $("#basket-item-price-" + key + "").text().replace(/[^0-9]/gi, '');
                itemSum = price * num;
                $("#basket-item-sum-" + key + "").text(itemSum);
                basketSum = parseInt(basketSum) - parseInt(price);
                $(".basket__footer-sum--sum").text(basketSum);
                // console.log('basketSum: ' + basketSum);

                products[key] = {
                  'name': productNAME,
                  'price': productPRICE,
                  'value': num
                };
                // console.log(products);

                // $.each(products, function (k, d) {
                //   if (d['value'] > 0) {
                //     console.log(d['name'] + '; цена = ' + d['price'] + '; кол-во = ' + d['value']);
                //   }
                // });

              }
              else {
                price = $("#basket-item-price-" + key + "").text().replace(/[^0-9]/gi, '');
                itemSum = price * num;
                $("#basket-item-sum-" + key + "").text(itemSum);
                basketSum = parseInt(basketSum) - parseInt(price);
                $(".basket__footer-sum--sum").text(basketSum);
                // console.log('basketSum: ' + basketSum);


                $('#slider__item-' + key).remove();
                Cookies.set(key, '0'); //удаляем куки
                // console.log('удалили ' + key);
                basketQty = basketQty - 1;
                $('#basket-qty').text(basketQty);
                $('.basket__footer-qty--sum').text(basketQty);
                if (basketQty == 0 || basketQty == '0') {
                  $('.basket-slider--empty').removeClass('deactive');
                }

                products[key] = {
                  'name': productNAME,
                  'price': productPRICE,
                  'value': 0
                };
                // console.log(products);

                // $.each(products, function (k, d) {
                //   if (d['value'] > 0) {
                //     console.log(d['name'] + '; цена = ' + d['price'] + '; кол-во = ' + d['value']);
                //   }
                // });

              }
            });

            $('#basket-item-plus-' + key).click(function (e) {
              let num = $('#basket-item-num-' + key).val();
              $('#basket-item-num-' + key).val(++num);
              $('#basket-item-calc-' + key).text(num);
              Cookies.set(key, num);
              // console.log(document.cookie);

              price = $("#basket-item-price-" + key + "").text().replace(/[^0-9]/gi, '');
              itemSum = parseInt(price) * parseInt(num);
              $("#basket-item-sum-" + key + "").text(itemSum);
              basketSum = parseInt(basketSum) + parseInt(price);
              $(".basket__footer-sum--sum").text(basketSum);
              // console.log('basketSum: ' + basketSum);

              products[key] = {
                'name': productNAME,
                'price': productPRICE,
                'value': num
              };
              // console.log(products);

              // $.each(products, function (k, d) {
              //   if (d['value'] > 0) {
              //     console.log(d['name'] + '; цена = ' + d['price'] + '; кол-во = ' + d['value']);
              //   }
              // });

            });

            // СУММА В КОРЗИНЕ
            $(".basket__footer-sum--sum").text(basketSum);

          }
        });
      }
    });

  });

  // кнопка закрытия корзины
  $('.basket__close').click(function (e) {
    $('#basket-modal').removeClass('active');
    // console.log(cookies);
    setTimeout(() => {
      $('.basket-slider').empty();
    }, 500);
  });

  // кнопка развертывания корзины
  $('.basket__arrows').click(function (e) {
    $('.basket__arrows').toggleClass('active');
    $('.basket').toggleClass('active');
    $('.basket-slider').toggleClass('active');
  });

  // удаления кнопки развертывания корзины
  $(window).resize(function () {
    if ($(window).width() < 1130) {
      $('.basket__arrows').removeClass('active');
      $('.basket').removeClass('active');
      $('.basket-slider').toggleClass('active');
    }
  }).resize();

  // кнопка оформить покупку
  $('#basket__footer-btn-buy').click(function (e) {

    if (basketSum != 0 && basketSum != '0') {


      $('#basket-form').addClass('active');
      // console.log(products);

      var res = '';
      $.each(products, function (k, d) {
        if (d['value'] > 0) {
          var summ = d['price'] * d['value'];
          res = res + 'наименование: ' + d['name'] + '\n' + 'кол-во: ' + d['value'] + '\n' + 'цена: ' + d['price'] + '₽\n' + 'сумма: ' + summ + '₽\n \n';
        }
      });

      $('#modal__input-products').val(res);

    }
    else {
      $('.basket-slider--empty').addClass('deactive');
      setTimeout(() => {
        $('.basket-slider--empty').removeClass('deactive');
      }, 300);
    }
  });

  // закрыть форму
  $('.form__close').click(function (e) {
    $('#basket-form').removeClass('active');
  });

  // AJAX отправка формы
  /* Article FructCode.com */
  $("#btn-ajax-modal").click(function (e) {
    event.preventDefault();
    $('#ajax_modal input[name="user_name"], #ajax_modal input[name="user_city"], #ajax_modal input[name="user_phone"], #ajax_modal input[name="user_email"]').removeClass('error-name error-city error-phone error-mail');
    if ($('#ajax_modal input[name="user_name"]').val().length > 0 && $('#ajax_modal input[name="user_city"]').val().length > 0 && $('#ajax_modal input[name="user_phone"]').val().length > 0 && $('#ajax_modal input[name="user_email"]').val().length > 0) {

      if ($('#ajax_modal input[name="user_email"]').val().length > 0) {
        var pattern = /^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i;
        var mail = $('#ajax_modal input[name="user_email"]').val();
        if (mail.search(pattern) == 0) {
          sendAjaxModal('result_form', 'ajax_modal', 'https://\' + window.location.hostname + \'/send.php');
          return false;
        }
        else {
          $('#ajax_modal input[name="user_email"]').addClass('error-email');
        }
      }

    }
    else {

      if ($('#ajax_modal input[name="user_name"]').val().length > 0) {
      } else {
        $('#ajax_modal input[name="user_name"]').addClass('error-name');
      }

      if ($('#ajax_modal input[name="user_city"]').val().length > 0) {
      } else {
        $('#ajax_modal input[name="user_city"]').addClass('error-city');
      }

      if ($('#ajax_modal input[name="user_phone"]').val().length > 0) {
      } else {
        $('#ajax_modal input[name="user_phone"]').addClass('error-phone');
      }

      if ($('#ajax_modal input[name="user_email"]').val().length > 0) {
      } else {
        $('#ajax_modal input[name="user_email"]').addClass('error-email');
      }

    }
  }
  );

  $('.contacts__input-box').click(function (e) {
    $('*').removeClass('error-name error-city error-phone error-email');
  })

  function sendAjaxModal(result_form, ajax_modal, url) {
    $.ajax({
      url: 'https://' + window.location.hostname + '/send.php',
      type: "POST", //метод отправки
      dataType: "html", //формат данных
      data: $("#" + ajax_modal).serialize(),  // Сеарилизуем объект
      success: function (response) { //Данные отправлены успешно
        alert('отправлено!');

        $('.basket-slider--empty').removeClass('deactive');
        $('.basket-slider__item').remove();
        let cookies = Cookies.get();
        // console.log(cookies);
        $.each(cookies, function (key, value) {
          if (key.startsWith('i') && value != 0 && value != '0') {
            Cookies.set(key, '0');
          }
        });
        basketQty = 0;
        basketSum = 0;
        $('#basket-qty').text(basketQty);
        $('.basket__footer-qty--sum').text(basketQty);
        $('.basket__footer-sum--sum').text(basketSum);
        $('#basket-form').removeClass('active');
        $('#basket-modal').removeClass('active');
        // console.log(cookies);

        setTimeout(() => {
          $('.contacts__input').val('');
        }, 100);

        // setTimeout(() => {
        //   $('.modal .contacts__item').removeClass('disable');
        //   $('.modal').removeClass('active');
        //   $('.modal__result').removeClass('active');
        // }, 7000);
      },
      error: function (response) { // Данные не отправлены
        alert('error');
      }
    });


  };


  // ввод только цифр в поле input tel
  var telInput = $('input[type="tel"]');

  for (var i = 0; i < telInput.length; i++) {
    telInput[i].oninput = function () {
      dpcmTel(this);
    }
  }
  function dpcmTel(input) {
    var value = input.value;
    var re = /[^0-9\-\(\)\+\ ]/gi;
    if (re.test(value)) {
      value = value.replace(re, '');
      input.value = value;
    }
  }


  // страница продукта
  if ($('.product__slider-for')) {
    // slick
    $('.product__slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.product__slider-nav'
    });
    $('.product__slider-nav').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      asNavFor: '.product__slider-for',
      focusOnSelect: true,
      arrows: false,
      centerMode: true,
      responsive: [
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            centerMode: false
          }
        }
      ]
    });
    // slick end

    $(window).resize(function () {
      // перенос ценника, кнопок и слайдера для мобилки
      if ($(window).width() < 1300) {
        $('.product__item-block-bottom').appendTo($('.product__item-block-left'));
      }
      else {
        $('.product__item-block-bottom').appendTo($('.product__item-block-right'));
      }

      if ($(window).width() < 600) {
        $('.product__item-block-btn').appendTo($('.product__item'));
      }
      else {
        $('.product__item-block-btn').appendTo($('.product__item-block-top'));
      }


    }).resize();
  }

});

