<form class="row checkout-form" enctype="multipart/form-data">
    <input type="hidden" name="action" value="add-order">
    <div class="col-md-6">

        <div class="my-checkout">
            <div class="my-checkout-steps">
                <div class="my-checkout-step" data-step="1">
                    <i class="icon icon-ofor-user"></i>
                    <span>1. Заказчик</span>
                </div>
                <div class="my-checkout-step" data-step="2">
                    <i class="icon icon-dost"></i>
                    <span>2. Способ <br> доставки</span>
                </div>
                <div class="my-checkout-step" data-step="3">
                    <i class="icon icon-payment"></i>
                    <span>3. Варианты <br> оплаты</span>
                </div>
                <div class="my-checkout-step" data-step="4">
                    <i class="icon icon-end-ofor"></i>
                    <span>4. Завершение <br> оформления заказа</span>
                </div>
            </div>


            <div id="step1" class="my-checkout-step-content active">
                <div class="my-checkout-step-title">
                    <span>1</span>
                    Заказчик
                </div>

                <div class="my-checkout-step-tabs">
                    <div class="tab-link-container">
                        <a href="#checkout-tab1" class="tab-link active">Физическое лицо</a>
                        <a href="#checkout-tab2" class="tab-link">Юридическое лицо</a>
                    </div>

                    <div id="checkout-tab1" class="tab active">
                        <label class="field">
                            Ф.И.О
                            <div>
                                 <input type="text" name="name" />
                            </div>

                        </label>
                        <label class="field">
                            Email
                            <div>
                                <input type="text" name="email" />
                            </div>
                        </label>
                        <label class="field">
                            Телефон
                            <div>
                                <input type="text" name="phone" />
                            </div>
                        </label>
                    </div>
                    <div id="checkout-tab2" class="tab">
                        <label class="field">
                            ИНН
                            <div>
                                <input type="text" name="inn" />
                            </div>
                        </label>
                    </div>
                </div>

                <a href="#" class="checkout-next">
                    Дальше (1/4)
                </a>
            </div>


            <div id="step2" class="my-checkout-step-content">
                <div class="my-checkout-step-title">
                    <span>2</span>
                    Способ доставки
                </div>


                <label class="field radio">
                    <input type="radio" checked="checked" name="delivery" value="Курьером по Москве"/>
                    <span>Курьером по Москве</span>

                </label>

                <div class="delivery-text active">
                    Доставка производиться курьером по Москве в пределах МКАД. <br>
                    Стоимость доставки: <strong>500 руб.</strong>
                </div>

                <label class="field radio">
                    <input type="radio" name="delivery" value="Самовывоз из офиса"/>
                    <span>Самовывоз из офиса</span>
                </label>

                <div class="delivery-text">
                    г.Москва, улица Гостиничная д. 3 офис 314 <br>
                    Понедельник - пятница <strong>с 10:00 до 19:00</strong> <br>
                    Суббота - воскресенье <strong>с 9:00 до 18:00 </strong>
                </div>


                <label class="field radio">
                    <input type="radio" name="delivery" value="Доставка по России"/>
                    <span>Доставка по России</span>
                </label>

                <div class="delivery-text">
                    <a href="#">Условия доставки по всей России</a>
                </div>



                <a href="#" class="checkout-next">
                    Дальше (2/4)
                </a>
            </div>


            <div id="step3" class="my-checkout-step-content">
                <div class="my-checkout-step-title">
                    <span>3</span>
                    Варианты оплаты
                </div>


                <div class="my-checkout-step-tabs">
                    <a href="#checkout-tab3" class="tab-link active">Наличный расчет</a>
                    <a href="#checkout-tab4" class="tab-link">Безналичный расчет</a>
                    <div id="checkout-tab3" class="tab active"></div>
                    <div id="checkout-tab4" class="tab">
                        <div class="file-block">
                            Можно прикрепить файл с реквизитами
                            <span>doc, docx, pdf, txt</span>
                            <div class="file-block-btn">
                                <input type="file" name="details[]">
                                <div class="checkout-btn">
                                    Выбрать файл
                                </div>
                            </div>
                        </div>

                        <h4>Или внесите вручную:</h4>
                        <label class="field">
                            Вид организации
                            <div>
                                <input type="text" name="org_type" />
                            </div>
                        </label>
                        <label class="field">
                            ОКОПФ
                            <div>
                                <input type="text" name="okopf" />
                            </div>
                        </label>
                        <label class="field">
                            Полное наименование
                            <div>
                                <input type="text" name="org_name" />
                            </div>
                        </label>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="field">
                                    ИНН
                                    <div>
                                        <input type="text" name="org_inn" />
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="field">
                                    КПП
                                    <div>
                                        <input type="text" name="org_kpp" />
                                    </div>
                                </label>
                            </div>
                        </div>
                        <label class="field">
                            Регион
                            <div>
                                <input type="text" name="region" />
                            </div>
                        </label>
                        <label class="field">
                            Юридический адрес
                            <div>
                                <input type="text" name="ur_address" />
                            </div>
                        </label>
                        <label class="field">
                            Фактический адрес
                            <div>
                                <input type="text" name="address" />
                            </div>
                        </label>
                    </div>
                </div>



                <a href="#" class="checkout-next">
                    Дальше (3/4)
                </a>
            </div>


            <div id="step4" class="my-checkout-step-content">
                <div class="my-checkout-step-title">
                    <span>4</span>
                    Завершение оформления заказа
                </div>


                <h5>
                    Если у вас возникли какие-то вопросы или комментарии, то вы их можете написать в сопроводительном комментарии:
                </h5>
                <div class="my-checkout-step-tabs" style="margin-top: 0;">
                    <div class="tab active" style="margin-top: 0;">
                        <label class="field textarea">
                            Ваш комментарий
                            <div>
                                <textarea name="order-text"></textarea>
                            </div>
                        </label>
                    </div>
                </div>

                <a href="#" class="submit-order checkout-btn">
                    Оформить заказ
                </a>
            </div>

        </div>
    </div>


    <div class="col-md-6">
        <?php
            global $woocommerce;
            $items = $woocommerce->cart->get_cart();
        ?>
        <table class="checkout-product-table">
            <thead>
                <tr>
                    <th>Продукт</th>
                    <th>кол-во</th>
                    <th>Стоимость</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalSum = 0;
                foreach($items as $item => $values) { ?>
                    <tr>
                    <?php
                    $_product =  wc_get_product( $values['data']->get_id());
                    $price = (int)$values['line_subtotal'];
                    $totalSum+=$price*$values['quantity'];
                    ?>
                        <td><?php echo $_product->get_title(); ?></td>
                        <td>x<?php echo $values['quantity']; ?></td>
                        <td><strong><?php echo number_format($price, 0, ',', ' '); ?> руб.</strong></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td>Всего</td>
                    <td></td>
                    <td>
                        <?php echo number_format($totalSum, 0, ',', ' '); ?> <span style="text-transform: none;">руб.</span>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</form>

