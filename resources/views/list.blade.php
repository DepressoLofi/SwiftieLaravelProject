@extends('main')

@section('content')
<?php

$dataPoints = [['label' => 'Taylor Swift', 'y' => $taylorSwift, 'color' => '#55b645'],
                ['label' => 'Fearless', 'y' => $fearless, 'color' => '#e4d425'],
                ['label' => 'Speak Now', 'y' => $speakNow, 'color' => '#ca5cce'],
                ['label' => 'Red', 'y' => $red, 'color' => '#e7163a'],
                ['label' => '1989', 'y' => $nen, 'color' => '#3996bd'],
                ['label' => 'Reputation', 'y' => $reputation, 'color' => '#393436'],
                ['label' => 'Lover', 'y' => $lover, 'color' => '#f0aac6'],
                ['label' => 'Folklore', 'y' => $folklore, 'color' => '#625f57'],
                ['label' => 'Evermore', 'y' => $evermore, 'color' => '#c76b03'],
                ['label' => 'Midnights', 'y' => $midnights, 'color' => '#3c435d']];

?>


    <div class="mt-10 mb-14 text-center">
        <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
                class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Number of swifties:
            </span>{{ $count }}</h1>
    </div>
    <div class="flex">
        <div class="w-1/6"></div>
        <div class="flex justify-around items-center w-4/6">
            <div class="w-2/3 me-10" style="padding-bottom: 500px;">
                <div class="me-16" id="chartContainer"></div>


            </div>

            <div class="w-1/3">
                <div class="flex flex-col w-80">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-auto" style="height: 500px">
                                <table
                                    class="min-w-full text-center text-sm font-light border-collapse border border-slate-400">
                                    <thead
                                        class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900">
                                        <tr>
                                            <th scope="col" class=" px-6 py-4">Name</th>
                                            <th scope="col" class=" px-6 py-4">Album</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($swifties as $swiftie)
                                            <tr class="border-b dark:border-neutral-500 bg-white">
                                                <td class="border border-neutral-800 text-black font-semibold px-6 py-4">
                                                    {{ $swiftie->name }}
                                                </td>
                                                <td class="border border-neutral-800 text-black font-normal px-6 py-4">
                                                    {{ $swiftie->album_name }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



        </div>

    </div>

    <script>
        window.onload = function() {


            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                backgroundColor: "transparent",
                title: {
                    text: "The Swiftie's pie chart"
                },
                data: [{
                    type: "pie",
                    color: "{color}",
                    yValueFormatString: "#,##0",
                    indexLabel: "{label} ({y})",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
@endsection
