<div class="main-wrapper">
    <div id="cvo-body">
        <div id="cvo-main">
            <div class="cvo-col-5">
                <div id="group-top-left">
                    <div id="cvo-profile" class="cvo-block">
                        <div id="cvo-profile-wraper">
                            <div id="cvo-profile-fullname-wraper">
                                @if ($createCv)
                                    <input placeholder="Nguyễn Văn A" name="name" value="{{$name ?? ''}}" class="design-input input-tem">
                                @else
                                    <span id="cvo-profile-fullname">{{ $name }}</span>
                                @endif
                            </div>
                            <div id="cvo-profile-title-wraper">
                                @if ($createCv)
                                    <input placeholder="Nhân viên kinh doanh" name="job" value="{{$job ?? ''}}" class="design-input input-tem">
                                @else
                                    <span id="cvo-profile-title">{{$job}}</span>
                                @endif
                            </div>
                            <div id="cvo-profile-avatar-wraper" class="profile-item">
                                <img id="cvo-profile-avatar" src="https://www.topcv.vn/images/default-avatar.png" value="preview_avatar" alt="avatar">
                            </div>
                        </div>
                        <div class="cvo-block-header">
                            <span id="cvo-profile-blocktitle">Thông tin liên hệ</span>
                        </div>
                        <div class="cvo-block-body">
                            <div class="contact-item d-flex">
                                <i class="fa fa-calendar-o"></i>
                                @if ($createCv)
                                    <input placeholder="19/05/1992" name="birthday" value="{{$birthday ?? ''}}" class="design-input input-tem">
                                @else
                                    <span id="cvo-profile-dob">{{$birthday}}</span>
                                @endif
                            </div>
                            <div class="contact-item d-flex">
                                <i class="fa fa-user"></i>
                                @if ($createCv)
                                    <input placeholder="Nam" name="gender" value="{{$gender ?? ''}}" class="design-input input-tem">
                                @else
                                    <span id="cvo-profile-gender">{{ $gender }}</span>
                                @endif
                            </div>
                            <div class="contact-item d-flex">
                                <i class="fa fa-tablet"></i>
                                @if ($createCv)
                                    <input placeholder="(024) 6680 5588" name="phone" value="{{$phone ?? ''}}" class="design-input input-tem">
                                @else
                                    <span id="cvo-profile-phone">{{ $phone }}</span>
                                @endif
                            </div>
                            <div class="contact-item d-flex">
                                <i class="fa fa-envelope-o"></i>
                                @if ($createCv)
                                    <input placeholder="hotro@topcv.vn" name="email" value="{{$email ?? ''}}" class="design-input input-tem">
                                @else
                                    <span id="cvo-profile-email">{{ $email }}</span>
                                @endif
                            </div>
                            <div class="contact-item d-flex">
                                <i class="fa fa-home"></i>
                                @if ($createCv)
                                    <input placeholder="Số 10, đường 10, TopCV" name="address" value="{{$address ?? ''}}" class="design-input input-tem">
                                @else
                                    <span id="cvo-profile-address">{{ $address }}</span>
                                @endif
                            </div>
                            <div class="contact-item d-flex">
                                <i class="fa fa-globe"></i>
                                @if ($createCv)
                                    <input placeholder="https://google.com/" name="website" value="{{$website ?? ''}}" class="design-input input-tem">
                                @else
                                    <span id="cvo-profile-website"><a href="{{ $website ?? '' }}" target="_blank" class="cvo-clickable-link" rel="noreferrer noopener">{{ $website }}</a></span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div id="group-bottom-left">
                    <div class="section-line"></div>
                    <div id="cvo-skillgroup" class="cvo-block">
                        <div class="cvo-block-header"><span id="cvo-skillgroup-blocktitle">Các kỹ năng</span></div>
                        <div class="block-content">
                            <div id="skill-table" class="cvo-block-content">

                                <div class="row">
                                    @if ($createCv)
                                        <input placeholder="Tin học văn phòng TOPCV" name="skill" value="{{$skill ?? ''}}" class="design-input input-tem">
                                    @else
                                        <div>{{ $skill }}</div>
                                        <div style="clear: both"></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div style="clear: both"></div>
                    </div>
                    <div class="section-line"></div>
                    <div id="cvo-interests" class="cvo-block">
                        <div class="cvo-block-header"><span id="cvo-interest-blocktitle">Sở thích</span></div>
                        <div class="block-content">
                            @if ($createCv)
                                <input placeholder="Đọc sách" name="hobit" value="{{$hobit ?? ''}}" class="design-input input-tem">
                            @else
                                <div>{{ $hobit }}</div>
                                <div style="clear: both"></div>
                            @endif
                        </div>
                        <div style="clear: both"></div>
                    </div>
                </div>
            </div>
            <div class="cvo-col-7 width100">
                <div id="group-right">
                    <div id="cvo-objective" class="cvo-block">
                        <div class="cvo-block-header">
                            <span id="cvo-objective-blocktitle">Mục tiêu nghề nghiệp</span>
                        </div>
                        <div class="cvo-block-body">
                            @if ($createCv)
                                <input placeholder="Mục tiêu nghề nghiệp" name="career_goals" value="{{$career_goals ?? ''}}" class="design-input input-tem">
                            @else
                                <div id="cvo-objective-objective">{{ $career_goals }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="section-line"></div>
                    <div id="cvo-education" class="cvo-block">
                        <div class="cvo-block-header">
                            <span id="cvo-education-blocktitle">Học vấn</span>
                        </div>
                        <div id="education-table" class="cvo-block-body">
                            <div class="row ">
                                @if ($createCv)
                                    <input placeholder="Học vấn" name="education" value="{{$education ?? ''}}" class="design-input input-tem">
                                @else
                                    <div>{{ $education }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="section-line"></div>
                    <div id="cvo-experience" class="cvo-block">
                        <div class="cvo-block-header">
                            <span id="cvo-experience-blocktitle">Kinh nghiệm làm việc</span>
                        </div>
                        <div id="experience-table" class="cvo-block-body">
                            <div class="row ">
                                @if ($createCv)
                                    <input placeholder="Kinh nghiệm làm việc" name="work_experience" value="{{$work_experience ?? ''}}" class="design-input input-tem">
                                @else
                                    <div>{{ $work_experience }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="section-line"></div>
                    <div id="cvo-activity" class="cvo-block">
                        <div class="cvo-block-header"><span id="cvo-activity-blocktitle">Hoạt động</span></div>
                        <div id="activity-table" class="cvo-block-body">
                            <div class="row ">
                                @if ($createCv)
                                    <input placeholder="Hoạt động" name="activities" value="{{$activities ?? ''}}" class="design-input input-tem">
                                @else
                                    <div>{{ $activities }}</div>
                                @endif
                            </div>
                        </div>
                        <div style="clear: both"></div>
                    </div>
                    <div class="section-line"></div>
                    <div id="cvo-award" class="cvo-block">
                        <div class="cvo-block-header"><span id="cvo-award-blocktitle">Giải thưởng, Chứng chỉ</span></div>
                        <div id="award-table" class="cvo-block-body">
                            <div>
                                @if ($createCv)
                                    <input placeholder="Hoạt động" name="certifications" value="{{$certifications ?? ''}}" class="design-input input-tem">
                                @else
                                    <div>{{ $certifications }}</div>
                                @endif
                                <div style="clear:both;"></div>
                            </div>
                        </div>
                        <div style="clear: both"></div>
                    </div>
                    <div class="section-line"></div>
                </div>
            </div>
        </div>
    </div>
</div>