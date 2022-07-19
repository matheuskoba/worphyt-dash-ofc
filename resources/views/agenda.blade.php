<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Worphyt Dashboard</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/agendastyle.css') }}" >

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    <body>
        <x-pack-navbar :user="$user"/>

        <div class="title">
            <h2>Dashboard</h2>
            <p>Agenda</p>
        </div>
        <div class="main-container-wrapper">
            <main>
                <div class="calendar-container">
                    <div class="calendar-container__header">
                        <button class="calendar-container__btn calendar-container__btn--left" title="Previous">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                        <h2 class="calendar-container__title">Outubro 2022</h2>
                        <button class="calendar-container__btn calendar-container__btn--right" title="Next">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                    <div class="calendar-container__body">
                        <div class="calendar-table">
                            <div class="calendar-table__header">
                                <div class="calendar-table__row">
                                    <div class="calendar-table__col">D</div>
                                    <div class="calendar-table__col">S</div>
                                    <div class="calendar-table__col">T</div>
                                    <div class="calendar-table__col">Q</div>
                                    <div class="calendar-table__col">Q</div>
                                    <div class="calendar-table__col">S</div>
                                    <div class="calendar-table__col">S</div>
                                </div>
                            </div>
                            <div class="calendar-table__body">
                                <div class="calendar-table__row">
                                    <div class="calendar-table__col calendar-table__inactive">
                                        <div class="calendar-table__item">
                                            <span>30</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col calendar-table__today">
                                        <div class="calendar-table__item">
                                            <span>1</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>2</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>3</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>4</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col calendar-table__event">
                                        <div class="calendar-table__item">
                                            <span>5</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>6</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="calendar-table__row">
                                    <div class="calendar-table__col calendar-table__event">
                                        <div class="calendar-table__item">
                                            <span>7</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>8</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>9</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>10</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>11</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>12</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>13</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="calendar-table__row">
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>14</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>15</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col calendar-table__event calendar-table__event--long calendar-table__event--start">
                                        <div class="calendar-table__item">
                                            <span>16</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col calendar-table__event calendar-table__event--long">
                                        <div class="calendar-table__item">
                                            <span>17</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col calendar-table__event calendar-table__event--long calendar-table__event--end">
                                        <div class="calendar-table__item">
                                            <span>18</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>19</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>20</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="calendar-table__row">
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>21</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>22</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>23</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>24</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>25</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>26</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col calendar-table__event calendar-table__event--long calendar-table__event--start">
                                        <div class="calendar-table__item">
                                            <span>27</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="calendar-table__row">
                                    <div class="calendar-table__col calendar-table__event calendar-table__event--long calendar-table__event--end">
                                        <div class="calendar-table__item">
                                            <span>28</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>29</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>30</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col">
                                        <div class="calendar-table__item">
                                            <span>31</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col calendar-table__event calendar-table__inactive">
                                        <div class="calendar-table__item">
                                            <span>1</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col calendar-table__inactive">
                                        <div class="calendar-table__item">
                                            <span>2</span>
                                        </div>
                                    </div>
                                    <div class="calendar-table__col calendar-table__inactive">
                                        <div class="calendar-table__item">
                                            <span>3</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="events-container">
                    <span class="events__title">Upcoming events this month</span>
                    <ul class="events__list">
                        <li class="events__item">
                            <div class="events__item--left">
                                <span class="events__name">Town hall meeting</span>
                                <span class="events__date">Oct 5</span>
                            </div>
                            <span class="events__tag">16:00</span>
                        </li>
                        <li class="events__item">
                            <div class="events__item--left">
                                <span class="events__name">Meet with George</span>
                                <span class="events__date">Oct 7</span>
                            </div>
                            <span class="events__tag">10:00</span>
                        </li>
                        <li class="events__item">
                            <div class="events__item--left">
                                <span class="events__name">Vacation!!!</span>
                                <span class="events__date">Oct 16 - Oct 18</span>
                            </div>
                            <span class="events__tag events__tag--highlighted">All day</span>
                        </li>
                        <li class="events__item">
                            <div class="events__item--left">
                                <span class="events__name">Visit Grandma</span>
                                <span class="events__date">Oct 27 - Oct 28</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </main>
        </div>
    </body>
</html>
