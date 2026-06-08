<?php
require_once (dirname(__FILE__) . '/../etc/get-market-price.php');

if (is_null($marketPrice)) {
    $marketPrice = new MarketPrice();
}
?>

<section class="gold-info">
    <div class="common-ttl">
        <div class="section-inner">
						<h2 class="kaitori-title">
							<span class="common-ttl-sub">本日のプラチナ</span>
							<span class="common-ttl-main">価格相場<span class="color-red">早見表</span></span>
						</h2>
            <div class="common-ttl-en">PriceTable</div>
        </div>
    </div>
    <div class="section-inner">
        <div class="graph -cushion shadow-none">
            <div class="head">
                <div class="red-border-left-ttl">
                    <h2>プラチナの価格相場 推移グラフ</h2>
                    <div class="period fs_10"><?php echo $marketPrice->chart_period(); ?></div>
                </div>
            </div>
            <div class="body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="myChart" width="716" height="358" style="display: block; width: 716px; height: 358px;" class="chartjs-render-monitor"></canvas>
                <div class="ta-c">※土日・祝日を除く税込小売価格の推移です。</div>
            </div>
        </div>
        <script>
        $(window).on('load', function(){

            var ctx = document.getElementById('myChart').getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo $marketPrice->chart_labels(); ?>,
                    datasets: [{
                        label: "プラチナ価格相場",
                        lineTension: 0,
                        data: <?php echo $marketPrice->chart_data('pt', true, 'プラチナ'); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, .1)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                        ],
                        borderWidth: 2,
                        pointRadius: 1,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: <?php echo $marketPrice->gold_data_min(); - 500 ?>,
                                max: <?php echo $marketPrice->gold_data_max(); + 100 ?>,
                                autoSkip: true,
                                maxTicksLimit: 8,
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                reverse: true,
                                autoSkip: true,
                                maxTicksLimit: 5,
                                maxRotation: 0,
                                minRotation: 0,
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            title: function (ti, data){
                                return ti[0].xLabel.replace('/', '月') + '日';
                            },
                            label: function(ti, data){
                                const formatter = new Intl.NumberFormat('ja-JP');
                                return formatter.format(data.datasets[0].data[ti.index]) + "円(/g)";
                            }
                        }
                    },
                    layout: {
                        padding: {
                            right: 20,
                        }
                    },
                }
            });
        });
        </script>

        <div class="table ta-c">
            <table>
                <thead>
                    <tr>
                        <td><p>品位</p></td>
                        <td><p>価格相場</p></td>
                        <td><p>前日比</p></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $compare = $marketPrice->get('c_pt'); ?>
                    <tr>
                        <td>
                            <div class="ta-l"><a class="fc_blue" href="#">プラチナ</a></div>
                        </td>
                        <td>
                            <div class="bold">¥<?php echo $marketPrice->get('platinum'); ?></div>
                        </td>
                        <td>
                            <div class="base-font-size">(<?php echo ($compare >= 0 ? '+' : '') . $compare; ?><span>円</span>)</div>
                        </td>
                    </tr>
                    <?php
                    $platinum_types = [
                        '1000' => [
                            'url' => 'platinum',
                        ],
                        '950' => [
                            'url' => 'platinum',
                        ],
                        '900' => [
                            'url' => 'platinum',
                        ],
                        '850' => [
                            'url' => 'platinum',
                        ],
                    ];
                    ?>
                    <?php foreach ($platinum_types as $d => $v): ?>
                        <?php $compare = number_format($marketPrice->get('c_pt', false) * $marketPrice->ratio['pt' . $d]); ?>
                        <tr>
                            <td>
                                <div class="ta-l"><a class="fc_blue" href="#">pt<?php echo $d; ?></a></div>
                            </td>
                            <td>
                                <div class="bold">¥<?php echo $marketPrice->get('pt' . $d); ?></div>
                            </td>
                            <td>
                                <div class="base-font-size">(<?php echo ($compare >= 0 ? '+' : '') . $compare; ?><span>円</span>)</div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="mt-8">
              <picture>
                <source media="(max-width: 767px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/souba_text_platinum_sp.png">
                <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/souba_text_platinum_pc.png">
                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/kaitori/souba_text_platinum_sp.png" style="max-width:100%; height:auto;">
              </picture>
            </div>
        </div>

    </div>
</section>
