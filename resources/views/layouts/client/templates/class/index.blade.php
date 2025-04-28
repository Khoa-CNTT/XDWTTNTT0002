<div class="container mt-5 mb-5">
    <div class="row">
        @if (isset($classUser) && count($classUser) > 0)
        @foreach($classUser as $index => $class)


            <div class="col-md-6 col-xl-4 mb-5">
                <div class="block block-rounded h-100">
                    <div class="block-header">
                        <div class="flex-grow-1 text-muted fs-sm fw-semibold">
                            <img class="img-avatar img-avatar32 img-avatar-thumb me-2" src="{{ asset($user->img) }}" alt="avt">
                            <span>{{ $user->hoTen }}</span>
                        </div>
                    </div>
                    <div class="block-content bg-body-light text-center">
                        <h3 class="fs-4 mb-3">
                            @if($class->subject)
                                    {{ $class->subject->tenMonHoc }}
                                @else
                                    Chưa đề xuất môn học
                                @endif

                        </h3>
                        <h5 class="text-muted mb-3" style="font-size:13px">
                            @if($class->subject && $class->subject->meTa)
                                    {{ $class->subject->meTa }}
                                @else
                                    Mô tả không có
                                @endif
                        </h5>
                        <div class="push">
                            <span class="badge bg-info text-uppercase fw-bold py-2 px-3">
                                {{ $class->khoi->tenKhoi }}
                            </span>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="row g-sm">
                            <div class="col-12 mb-3">
                                <a class="btn w-100 btn-secondary btn-view-group" href="{{ route('user.class.test', ['id' => $class->khoi->id]) }}">
                                    <i class="bi bi-search"></i> Xem bài kiểm tra
                                </a>
                            </div>
                            <div class="col-12">
                                <a class="btn w-100 btn-secondary btn-view-group" href="{{ route('user.class.test-result', ['id' => $class->khoi->id]) }}">
                                    <i class="bi bi-emoji-expressionless-fill navicon"></i> Xem kết quả
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @endif
        
    </div>
</div>


