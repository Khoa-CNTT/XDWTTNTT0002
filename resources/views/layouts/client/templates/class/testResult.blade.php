<div class="container mt-5 mb-5 main-panel">
    <div class="content-wrapper">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h3 class="page-title mb-0">📋 Danh sách kết quả</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('user.class') }}">Lớp học</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped table__customer align-middle text-center">
                                <thead class="table-success">
                                    <tr>
                                        <th>Kết Quả</th>
                                        <th>Mã Thành Viên</th>
                                        <th>Tên Bài Thi</th>
                                        <th>Môn Thi</th>
                                        <th>Điểm Thi</th>
                                        <th>Số Câu Đúng</th>
                                        <th>Thời Gian Vào Thi</th>
                                        <th>Thời Gian Làm Bài</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @forelse ($results as $index => $item)
                                        @php
                                            $seconds = $item->thoiGianLamBai;
                                            $minutes = floor($seconds / 60);
                                            $remainingSeconds = $seconds % 60;
                                        @endphp
                                        <tr>
                                            <td>Lần {{ $index + 1 }}</td>
                                            <td>{{ $item->maThanhVien }}</td>
                                            <td>{{ $item->deThi->tenBaiThi ?? 'Không xác định' }}</td>
                                            <td>{{ $item->deThi->monHoc->tenMonHoc ?? 'Không xác định' }}</td>
                                            <td><span class="badge bg-info text-dark">{{ $item->diemThi }}</span></td>
                                            <td>{{ $item->soCauDung }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->thoiGianVaoThi)->format('H:i d/m/Y') }}</td>
                                            <td>{{ $minutes }} phút {{ $remainingSeconds }} giây</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-muted">Không có kết quả nào được tìm thấy.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
