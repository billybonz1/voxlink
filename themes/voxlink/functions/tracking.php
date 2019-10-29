<?php
function add_help_menu() {
    add_menu_page(
        'Трекинг пользователей', // имя в меню
        'Трекинг пользователей', // title страницы
        'manage_options', // уровень доступа
        'tracking', // slug страницы
        'render_tracking_page', // функция, отображающая собственно страницу
        'dashicons-admin-users', // иконка
        '2' // позиция в меню
    );
}
add_action('admin_menu', 'add_help_menu');

function render_tracking_page() { ?>
    <form action="/wp-admin/admin.php">
        <h2>Введите id пользователя для показа информации</h2>
        <input type="text" name="id" placeholder="Введите id">
        <input type="hidden" name="page" value="tracking" />
        <button>Посмотреть</button>
    </form>

    <?php if(isset($_GET['id'])){?>
        <?php
            $user = get_userdata($_GET['id']);
        ?>
        <script type="text/javascript" src="/wp-content/themes/voxlink/tracking-page/d3.js"></script>
        <script type="text/javascript" src="/wp-content/themes/voxlink/tracking-page/d3.csv.js"></script>
        <script type="text/javascript" src="/wp-content/themes/voxlink/tracking-page/d3.time.js"></script>
        <link type="text/css" rel="stylesheet" href="/wp-content/themes/voxlink/tracking-page/style.css"/>
        <br><br>
        <div>
            <strong>ID:</strong> <?php echo $_GET['id']; ?>
        </div>
        <div>
            <strong>Логин:</strong> <?php echo $user->user_login; ?>
        </div>
        <div>
            <strong>Имя:</strong> <?php echo $user->user_nicename; ?>
        </div>

        <div>
            <strong>Первое посещение:</strong> <?php echo get_field("firstTime", "user_".$_GET['id']); ?>
        </div>
        <?php
        $history = get_field("history", "user_".$_GET['id']);


        $viewsArr = [];
        foreach($history as $record){
            foreach($viewsArr as $key=>$item){
                if($item['url'] == $record['url']){
                    $currentKey = $key;
                }else{
                    unset($currentKey);
                }
            }

            if(empty($record['seconds'])){
                $seconds = "";
            } else {
                $seconds = " - ". $record['seconds']." секунд";
            }

            if(isset($currentKey)){
                $count = $viewsArr[$currentKey]['count'] + 1;
                $viewsArr[$currentKey]['count'] = $count;
                $viewsArr[$currentKey]['dates'][] = $record['time'].$seconds;
            }else{
                $viewsArr[] = array(
                    "title" => $record['title'],
                    "url" => $record['url'],
                    "count" => 1,
                    "dates" => array(
                        $record['time'].$seconds
                    )
                );
            }
        }
        ?>

        <div id="viewUrls">
            <strong>Просмотренные ссылки</strong><br>
            <?php foreach($viewsArr as $url){?>
            Заголовок: <?php echo $url['title'];?> <br>
            Ссылка: <a href="<?php echo $url['url'];?>" target="_blank"><?php echo $url['url'];?></a> <br>
            Просмотров: <?php echo $url['count'];?> <br> <br>
            Время посещений: <br>
                <?php foreach($url['dates'] as $date){?>
                    <?php echo $date;?> <br>
                <?php } ?>
            <?php } ?>
            <br> <br><br> <br>
        </div>

        <div id="body">

        </div>

        <?php
        foreach($history as $record){
            $date = strtotime($record['time']);
            if(!empty($record['seconds'])){
            ?>
               <div class="graph-item" data-date="<?php echo $date?>" data-seconds="<?php echo $record['seconds']?>"></div>
        <?php }
        } ?>


        <script type="text/javascript">
            var data = [];
            jQuery(".graph-item").each(function(){
                var $this = jQuery(this);
                console.log($this.data("date"));
                data.push({
                   data: $this.attr("data-date"),
                   value: $this.data("seconds")
                });
            });
            console.log(data);
            var m = [79, 80, 160, 79],
                w = 1280 - m[1] - m[3],
                h = 800 - m[0] - m[2],
                parse = d3.time.format("%Y-%m-%d").parse,
                format = d3.time.format("%Y");

            // Scales. Note the inverted domain for the y-scale: bigger is up!
            var x = d3.time.scale().range([0, w]),
                y = d3.scale.linear().range([h, 0]),
                xAxis = d3.svg.axis().scale(x).orient("bottom").tickSize(-h, 0).tickPadding(6),
                yAxis = d3.svg.axis().scale(y).orient("right").tickSize(-w).tickPadding(6);

            // An area generator.
            var area = d3.svg.area()
                .interpolate("step-after")
                .x(function(d) { return x(d.date); })
                .y0(y(0))
                .y1(function(d) { return y(d.value); });

            // A line generator.
            var line = d3.svg.line()
                .interpolate("step-after")
                .x(function(d) { return x(d.date); })
                .y(function(d) { return y(d.value); });

            var svg = d3.select("#body").append("svg:svg")
                .attr("width", w + m[1] + m[3])
                .attr("height", h + m[0] + m[2])
              .append("svg:g")
                .attr("transform", "translate(" + m[3] + "," + m[0] + ")");

            var gradient = svg.append("svg:defs").append("svg:linearGradient")
                .attr("id", "gradient")
                .attr("x2", "0%")
                .attr("y2", "100%");

            gradient.append("svg:stop")
                .attr("offset", "0%")
                .attr("stop-color", "#fff")
                .attr("stop-opacity", .5);

            gradient.append("svg:stop")
                .attr("offset", "100%")
                .attr("stop-color", "#999")
                .attr("stop-opacity", 1);

            svg.append("svg:clipPath")
                .attr("id", "clip")
              .append("svg:rect")
                .attr("x", x(0))
                .attr("y", y(1))
                .attr("width", x(1) - x(0))
                .attr("height", y(0) - y(1));

            svg.append("svg:g")
                .attr("class", "y axis")
                .attr("transform", "translate(" + w + ",0)");

            svg.append("svg:path")
                .attr("class", "area")
                .attr("clip-path", "url(#clip)")
                .style("fill", "url(#gradient)");

            svg.append("svg:g")
                .attr("class", "x axis")
                .attr("transform", "translate(0," + h + ")");

            svg.append("svg:path")
                .attr("class", "line")
                .attr("clip-path", "url(#clip)");

            svg.append("svg:rect")
                .attr("class", "pane")
                .attr("width", w)
                .attr("height", h)
                .call(d3.behavior.zoom().on("zoom", zoom));


              // Parse dates and numbers.
              data.forEach(function(d) {
                d.date = new Date(parseInt(d.data)*1000);
                d.value = +d.value;
              });

              // Compute the maximum price.
              var minDate = new Date(d3.min(data, function(d) { return d.data; })*1000);
              var maxDate = new Date(d3.max(data, function(d) { return d.data; })*1000);
              x.domain([minDate,maxDate]);
              y.domain([0, d3.max(data, function(d) { return d.value; }) + 10 ]);

              // Bind the data to our path elements.
              svg.select("path.area").data([data]);
              svg.select("path.line").data([data]);

              draw();

            function draw() {
              svg.select("g.x.axis").call(xAxis);
              svg.select("g.y.axis").call(yAxis);
              svg.select("path.area").attr("d", area);
              svg.select("path.line").attr("d", line);

            }

            function zoom() {
              d3.event.transform(x); // TODO d3.behavior.zoom should support extents
              draw();
            }

        </script>
    <?php } ?>

<?php }