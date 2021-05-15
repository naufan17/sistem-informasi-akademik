<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD SANTRI</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
</head>

<body class="work-sans leading-normal text-base tracking-normal">

    <nav id="header" class="w-full z-30 top-0 py-1 bg-indigo-900">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
            <div class="flex space-x-4 py-5">

                <!--LOGO-->
                <div class="object-left">
                    <img src="images/logo.png" class="w-24">
                </div>

                <!--NAME-->
                <div class="text-center font-sans text-white mt-2">
                    <a class="text-1xl">MADRASAH DINIYYAH<br></a>
                    <a class="text-2xl font-bold">NURUL UMMAH<br></a>
                    <a class="text-1xl tracking-widest">Y O G Y A K A R T A</a>
                </div>
            </div>

            <div class=" text-white text-right">
                <a class="text-2xl">SISTEM INFORMASI AKADEMIK <br></a>
                <a class="text-1xl tracking-widest">MDNU</a>
            </div>
        </div>
    </nav>

    <div class="bg-gray-100 font-family-karla flex">

        <aside class="relative bg-white h-screen w-64 hidden sm:block shadow-xl">

            <nav class="font-semibold pt-3">

                <div class="text-gray-900">
                    <div class="pt-6 px-6 mb-8">
                        <div class="text-center bg-gray-100 rounded-lg shadow-xl">
                            <div class="px-6 py-6">
                                <img src="https://source.unsplash.com/random/350x350" alt="random image" class="object-center rounded-full">
                            </div>
                            <h4 class="pb-6 text-l font-semibold leading-tight truncate">Hai There!</h4>
                        </div>
                    </div>
                </div>

                <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                    <a href="index.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                        <i class="fas fa-id-card-alt mr-3"></i>
                        Data Pribadi
                    </a>
                </div>

                <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                    <a href="mapel.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                        <i class="fas fa-book-open mr-3"></i>
                        Mata Pelajaran
                    </a>
                </div>

                <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                    <a href="tables.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                        <i class="fas fa-star-half-alt mr-3"></i>
                        Nilai
                    </a>
                </div>

                <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                    <a href="forms.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                        <i class="fas fa-star mr-3"></i>
                        Nilai Rata-rata
                    </a>
                </div>

                <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                    <a href="tabs.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                        <i class="fas fa-address-book mr-3"></i>
                        Ustadz
                    </a>
                </div>

                <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                    <a href="calendar.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                        <i class="fas fa-address-book mr-3"></i>
                        Santri
                    </a>
                </div>
            </nav>
            <a href="#" class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
                <i class="fas fa-sign-out-alt mr-3"></i>
                Log Out
            </a>
        </aside>

        <div class="w-full flex flex-col h-screen overflow-y-hidden">
            <!-- Mobile Header & Nav -->
            <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
                <div class="flex items-center justify-between">
                    <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                    <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                        <i x-show="!isOpen" class="fas fa-bars"></i>
                        <i x-show="isOpen" class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Dropdown Nav -->
                <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                    <a href="index.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                    <a href="blank.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        Blank Page
                    </a>
                    <a href="tables.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-table mr-3"></i>
                        Tables
                    </a>
                    <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-align-left mr-3"></i>
                        Forms
                    </a>
                    <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-tablet-alt mr-3"></i>
                        Tabbed Content
                    </a>
                    <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-calendar mr-3"></i>
                        Calendar
                    </a>
                    <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-cogs mr-3"></i>
                        Support
                    </a>
                    <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-user mr-3"></i>
                        My Account
                    </a>
                    <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Sign Out
                    </a>
                    <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                        <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
                    </button>
                </nav>
                <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
            </header>

            <div class="overflow-x-hidden">
                <main class="p-6">
                    <div class="flex px-24 py-8">
                        <div class="flex-1"></div>

                        <div class="flex-1 text-center">
                            <h1 class="text-3xl text-gray-800 pb-6">SELAMAT DATANG DI XXXX</h1>
                            <img src="images/dasbor.png" class="py-8">
                            <h1 class="text-lg text-black pb-6">Mulai menjelajah untuk melihat informasi seputar akademik</h1>
                        </div>

                        <div class="flex-1"></div>

                    </div>
                    <!--
                    <div class="flex flex-wrap mt-6">
                        <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
                            <p class="text-xl pb-3 flex items-center">
                                <i class="fas fa-plus mr-3"></i> Monthly Reports
                            </p>
                            <div class="p-6 bg-white">
                                <canvas id="chartOne" width="400" height="200"></canvas>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
                            <p class="text-xl pb-3 flex items-center">
                                <i class="fas fa-check mr-3"></i> Resolved Reports
                            </p>
                            <div class="p-6 bg-white">
                                <canvas id="chartTwo" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-12">
                        <p class="text-xl pb-3 flex items-center">
                            <i class="fas fa-list mr-3"></i> Latest Reports
                        </p>
                        <div class="bg-white overflow-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    <tr>
                                        <td class="w-1/3 text-left py-3 px-4">Lian</td>
                                        <td class="w-1/3 text-left py-3 px-4">Smith</td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="w-1/3 text-left py-3 px-4">Emma</td>
                                        <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr>
                                        <td class="w-1/3 text-left py-3 px-4">Oliver</td>
                                        <td class="w-1/3 text-left py-3 px-4">Williams</td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="w-1/3 text-left py-3 px-4">Isabella</td>
                                        <td class="w-1/3 text-left py-3 px-4">Brown</td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr>
                                        <td class="w-1/3 text-left py-3 px-4">Lian</td>
                                        <td class="w-1/3 text-left py-3 px-4">Smith</td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="w-1/3 text-left py-3 px-4">Emma</td>
                                        <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr>
                                        <td class="w-1/3 text-left py-3 px-4">Oliver</td>
                                        <td class="w-1/3 text-left py-3 px-4">Williams</td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="w-1/3 text-left py-3 px-4">Isabella</td>
                                        <td class="w-1/3 text-left py-3 px-4">Brown</td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
    -->
                    <!-- FOOTER -->
                    <footer class="container mx-auto bg-white py-8 border-t border-gray-400">
                        <div class="container flex px-6 py-8 ">
                            <div class="w-full mx-auto flex flex-wrap">
                                <div class="text-left flex w-full lg:w-1/2 ">
                                    <div class="px-3 md:px-0">
                                        <h3 class="font-bold text-gray-900">Madrasah Diniyyah Pondok Pesantren Nurul Ummah Yogyakarta</h3>
                                        <a class="inline-block no-underline hover:text-black hover:underline pt-5" href="tel:+62 857 2565 5593">Telp. 0857 2565 5593</a><br>
                                        <a class="inline-block no-underline hover:text-black hover:underline" href="https://web.whatsapp.com/send?phone=6285725655593&text=Assalamualaikum%20Admin">WhatsApp. 0857 2565 5593</a><br>
                                        <a class="inline-block no-underline hover:text-black hover:underline" href="mailto:admisi.nurma@gmail.com">E-mail. admisi.nurma@gmail.com</a>
                                    </div>
                                </div>
                                <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
                                    <div class="px-3 md:px-0">
                                        <h3 class="font-bold text-gray-900">Media Sosial</h3>
                                        <ul class="list-reset items-center pt-3">
                                            <li>
                                                <a class="inline-block no-underline hover:text-black hover:underline py-1" href="https://instagram.com/nurulummahyk?igshid=1m74irp80dl0v">Instagram</a>
                                                <a class="inline-block no-underline hover:text-black hover:underline" href="https://www.youtube.com/channel/UCYQ8dFPzAkFF0WbS0r-IDaw">YouTube</a>
                                                <a class="inline-block no-underline hover:text-black hover:underline" href="https://nurulummah.com/">Website</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
            </div>
        </div>
        </main>

        <!-- AlpineJS -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
        <!-- ChartJS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

        <script>
            var chartOne = document.getElementById('chartOne');
            var myChart = new Chart(chartOne, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var chartTwo = document.getElementById('chartTwo');
            var myLineChart = new Chart(chartTwo, {
                type: 'line',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
    </div>


</body>

</html>