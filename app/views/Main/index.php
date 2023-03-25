<div class="title-door">
    <p class="title_d_p">Конфигуратор входной двери</p>
    <div class="two-div">
        <div id="doors-div">
            <div class="door-1 doors">
                <div class="handle-1 handles"></div>
            </div>
            <div class="door-2 doors">
                <div class="handle-2 handles"></div>
            </div>
        </div>
        <div class="params-head">
            <p class="params-title">Параметры</p>
            <div class="params-div">
                <form id="form-head" method="post">
                    <label for="paint_col">Цвет покраски:</label>
                    <select style="float: right;" id="paint_col" name="paint_col">
                        <option value="paint_red">красный</option>
                        <option value="paint_blue">синий</option>
                        <option value="paint_green">зеленый</option>
                        <option value="paint_yellow">желтый</option>
                    </select><br><br>

                    <label for="film_col">Цвет пленки:</label>
                    <select style="float: right;" id="film_col" name="film_col">
                        <option value="film_blue">синий</option>
                        <option value="film_red">красный</option>
                        <option value="film_green">зеленый</option>
                        <option value="film_yellow">желтый</option>
                    </select><br><br>

                    <label for="handle_col">Цвет ручки:</label>
                    <select style="float: right;" id="handle_col" name="handle_col">
                        <option value="handle_red">красный</option>
                        <option value="handle_blue">синий</option>
                        <option value="handle_green">зеленый</option>
                        <option value="handle_yellow">желтый</option>
                    </select><br><br>

                    <label for="width_l">Ширина:</label>
                    <input style="width: 60px;" type="number" id="width_l" name="width_l" min="800" max="950" step="50" value="800"><br><br>

                    <label for="height_l">Высота:</label>
                    <input style="width: 60px;" type="number" id="height_l" name="height_l" min="2000" max="2450" step="150" value="2000"><br><br>

                    <label for="opening_l">Открывание:</label>
                    <select style="float: right;" id="opening_l" name="opening_l">
                        <option value="r_side">Правое</option>
                        <option value="l_side">Левое</option>
                    </select><br><br>

                    <label style="float: left; width: 150px; text-align: right;">Аксессуары:</label>

                    <div style="text-align: end; position: relative; right: 40px;">
                        <label class="check_input" for="acs_1">Acs_1</label>
                        <label class="check_input" for="acs_2">Acs_2</label>
                        <label class="check_input" for="acs_3">Acs_3</label>
                    </div>

                    <input class="check_input" type="checkbox" id="Acs_3" name="acs_3" value="acs3">
                    <input class="check_input" type="checkbox" id="Acs_2" name="acs_2" value="acs2">
                    <input class="check_input" type="checkbox" id="Acs_1" name="acs_1" value="acs1">
                    <br>
                    <div style="height: 10px;"></div>

                    <p style="display: inline-block; font-size: 40px; width: 110px; margin-left: 300px; margin-bottom: 20px;">Итого: </p>
                    <input style="display: inline-block; width: 120px; height: 30px; background-color: #ededed; font-size: 40px; border: 0px solid white; margin-right: 0; float: none; text-align: initial;" id="pay_input" type="text" name="pay_input" value="16000" readonly>
                    <p style="display: inline-block; font-size: 40px; margin-bottom: 0;">руб.</p>
                    <div class="door_name" ></div>
                    <input type="submit" id="total_b" value="Отправить комплектацию">


                </form>
            </div>
        </div>
    </div>
    <div class="l_r_side">
        <span>Вид снаружи</span>
        <span style="display: inline-block; margin-left: 90px; margin-right: 90px; "></span>
        <span>Вид изнутри</span>
    </div>
</div>