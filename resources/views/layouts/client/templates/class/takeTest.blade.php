<nav class="nav border-bottom bg-white">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center py-2">
            <button id="btn-thoat" class="btn btn-hero btn-danger" role="button">
                <i class="bi bi-escape"></i> Thoát
            </button>
            <div class="nav-center">
                <span class="fw-bold fs-5">Thí sinh: {{ Str::title($user->hoTen) }}</span>
            </div>
            <div class="nav-right d-flex align-items-center">
                <div class="nav-time me-4">
                    <span class="fw-bold">
                        <i class="far fa-clock mx-2"></i>
                        <span id="timer" data-minutes="{{ $test->thoiGianThi }}"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid mt-3">
    <div class="d-flex justify-content-between align-items-center p-3 border">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="">Bài kiểm tra</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đang làm bài kiểm tra</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mt-5">
    <h2 class="text-center fw-bold text-dark mb-5">
        {{ $test->tenBaiThi }}
    </h2>

    <div class="alert alert-danger small">
        <strong>Chú ý:</strong> Thí sinh đọc kỹ đề trước khi làm bài.
    </div>

    <p class="fw-semibold">Tổng số câu hỏi: {{ $test->soLuongCauHoi }} câu</p>


    <form id="form-nop-bai" action="{{ route('user.class.test.submit-test', $test->id) }}" method="POST">
        @csrf
    
        {{-- Câu hỏi --}}
        @forelse ($questions as $index => $item)
            @php $question = $item->question; @endphp
    
            <div class="mb-4">
                <p class="fw-bold">Câu {{ $index + 1 }}: {{ $question->cauHoi }}</p>
    
                @foreach (['A', 'B', 'C', 'D'] as $option)
                    <label class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $question->{'dapAn' . $option} }}">
                        <span class="form-check-label">{{ $option }}. {{ $question->{'dapAn' . $option} }}</span>
                    </label>
                @endforeach
            </div>
        @empty
            <div class="alert alert-warning text-center">Không có câu hỏi nào để hiển thị.</div>
        @endforelse
    
        {{-- Nút nộp bài --}}
        <button type="submit" class="btn btn-primary">Nộp bài</button>
    </form>
    

    <div class="d-flex justify-content-center mt-4">
        {{ $questions->links('pagination::bootstrap-4') }}
    </div>
</div>

<script>
   document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("form-nop-bai");
    const timerElement = document.getElementById("timer");
    const minutes = parseInt(timerElement.dataset.minutes);
    const totalTimeInSeconds = minutes * 60;
    let timeInSeconds = totalTimeInSeconds;

    // Thêm thời gian vào thi từ PHP vào form
    const inputVaoThi = document.createElement("input");
    inputVaoThi.type = "hidden";
    inputVaoThi.name = "thoiGianVaoThi";
    inputVaoThi.value = "{{ session('thoiGianVaoThi') ? \Carbon\Carbon::parse(session('thoiGianVaoThi'))->toDateTimeString() : '' }}";
    form.appendChild(inputVaoThi);

    function updateTimerDisplay() {
        const mins = Math.floor(timeInSeconds / 60);
        const secs = timeInSeconds % 60;
        timerElement.textContent = `${mins}:${secs.toString().padStart(2, '0')}`;
    }

    updateTimerDisplay();

    const countdown = setInterval(() => {
        timeInSeconds--;
        updateTimerDisplay();

        if (timeInSeconds <= 0) {
            clearInterval(countdown);
            timerElement.textContent = "Hết giờ!";
            autoSubmit(); // Tự động nộp
        }
    }, 1000);

    function addThoiGianLamBaiInput() {
        const timeSpent = totalTimeInSeconds - timeInSeconds;
        const hiddenInput = document.createElement("input");
        hiddenInput.type = "hidden";
        hiddenInput.name = "thoiGianLamBai";
        hiddenInput.value = timeSpent;
        form.appendChild(hiddenInput);
    }

    function autoSubmit() {
        addThoiGianLamBaiInput();
        form.submit();
    }

    form.addEventListener("submit", function (e) {
        addThoiGianLamBaiInput(); // Gắn input thời gian khi submit thủ công
    });
});

</script>
