@props(['horoscopes'])
<div class="row mt-5 mb-3 d-flex justify-content-evenly">
    @foreach($horoscopes as $horoscope)
        <div class="col-12 col-md-6 col-lg-3 mx-1 mb-5 text-start prediction rounded-4 p-3 border">
            <div class="mx-auto justify-content-between d-flex">
                    <span class="border rounded-pill px-3">
                        <time>{{ date('j F, Y', strtotime($horoscope->date)) }}</time>
                    <span class="m_title">{{ $horoscope->sign }}</span></span>
                <span class="btn-group border rounded-pill shadow">
                        <button class="btn" type="button" onclick="edit('{{ $horoscope->id }}', '{{ date('Y-m-d', strtotime($horoscope->date)) }}', '{{ $horoscope->sign }}', '{{ $horoscope->description }}')">
                            <i class="fa-solid fa-pen-fancy"></i>
                        </button>
                        <button class="btn" type="button" onclick="deleteRecord('{{ $horoscope->id }}', '{{ date('M D Y', strtotime($horoscope->date)) }}', '{{ $horoscope->sign }}')">
                            <i class="fa-solid fa-folder-minus text-danger"></i>
                        </button>
                    </span>
            </div>
            <div class="fs-4">{{ $horoscope->description }}</div>
        </div>
    @endforeach
</div>
