<input hidden id="setting-color" name="set_color_temp2" value="{{ $set_color_temp2 ?? '' }}">

<div id="cvo-body">
    <div id="group-header" class="d-flex">
        <div class="cvo-col-7">
            <div id="cvo-profile-avatar-wraper" class="profile-item" style="margin-bottom: 10px;">
                @if ($createCv)
                <img style="width: 200px;" id="cvo-profile-avatar" src="https://www.topcv.vn/images/default-avatar.png" value="preview_avatar" alt="avatar">
                <input type="file" name="avatar_url"></input>
                @else
                <img style="width: 200px;" src="{{ $avatar_url ? asset($avatar_url) : 'https://www.topcv.vn/images/default-avatar.png' }}" value="preview_avatar" alt="avatar">
                @endif
            </div>
            <div class="cvo-profile-fullname-and-title">
                <div id="cvo-profile-fullname-wraper" class="text-center">
                    @if ($createCv)
                    <input placeholder="Nguyễn Văn A" name="name" value="{{$name ?? ''}}" class="design-input input-tem">
                    @else
                    <span id="cvo-profile-fullname">{{ $name }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="cvo-col-5">
            <div id="cvo-profile" class="cvo-block">
                <div class="contact-item">
                    Giới tính:
                    @if ($createCv)
                    <input placeholder="Nam" name="gender" value="{{$gender ?? ''}}" class="design-input input-tem">
                    @else
                    <span id="cvo-profile-gender">{{ $gender }}</span>
                    @endif
                </div>
                <div class="contact-item">
                    Ngày sinh:
                    @if ($createCv)
                    <input placeholder="19/05/1992" name="birthday" value="{{$birthday ?? ''}}" class="design-input input-tem">
                    @else
                    <span id="cvo-profile-dob">{{ $birthday }}</span>
                    @endif
                </div>
                <div class="contact-item">
                    Email:
                    @if ($createCv)
                    <input placeholder="hotro@topcv.vn" name="email" value="{{$email ?? ''}}" class="design-input input-tem">
                    @else
                    <span id="cvo-profile-email">{{ $email }}</span>
                    @endif
                </div>
                <div class="contact-item">
                    Điện thoại:
                    @if ($createCv)
                    <input placeholder="(024) 6680 5588" name="phone" value="{{$phone ?? ''}}" class="design-input input-tem">
                    @else
                    <span id="cvo-profile-phone">{{ $phone }}</span>
                    @endif
                </div>
                <div class="contact-item">
                    Địa chỉ:
                    @if ($createCv)
                    <input placeholder="Số 10, đường 10, TopCV" name="address" value="{{$address ?? ''}}" class="design-input input-tem">
                    @else
                    <span id="cvo-profile-address">{{ $address }}</span>
                    @endif
                </div>
                <div class="contact-item">
                    Website:
                    @if ($createCv)
                    <input placeholder="https://google.com" name="website" value="{{$website ?? ''}}" class="design-input input-tem">
                    @else
                    <span id="cvo-profile-website"><a href="{{ $website }}" target="_blank" class="cvo-clickable-link" rel="noreferrer noopener">{{ $website }}</a></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex cvo-col-7">
        <div id="group-left" class="width60">
            <div id="cvo-objective" class="cvo-block">
                <div class="cvo-block-header color {{$set_color_temp2 ?? '' }}">
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
            <div id="cvo-education" class="cvo-block">
                <div class="cvo-block-header color {{$set_color_temp2 ?? '' }}">
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
            <div id="cvo-experience" class="cvo-block">
                <div class="cvo-block-header color {{$set_color_temp2 ?? '' }}">
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
            <div id="cvo-activity" class="cvo-block">
                <div class="cvo-block-header color {{$set_color_temp2 ?? '' }}"><span id="cvo-activity-blocktitle">Hoạt động</span></div>
                <div id="activity-table" class="cvo-block-body">
                    <div class="row ">
                        @if ($createCv)
                        <input placeholder="Hoạt động" name="activities" value="{{$activities ?? ''}}" class="design-input input-tem">
                        @else
                        <div>{{ $activities }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
        <div class="cvo-col-5 width40">
            <div id="group-right">

                <div id="cvo-skillgroup" class="cvo-block">
                    <div class="cvo-block-header color {{$set_color_temp2 ?? '' }}">
                        <span id="cvo-skillgroup-blocktitle">Các kỹ năng</span>
                    </div>
                    <div class="block-content">
                        <div id="skill-table">

                            @if ($createCv)
                            <input placeholder="Tin học văn phòng TOPCV" name="skill" value="{{$skill ?? ''}}" class="design-input input-tem">
                            @else
                            <div>{{ $skill }}</div>
                            <div style="clear: both"></div>
                            @endif

                        </div>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div id="cvo-award" class="cvo-block">
                    <div class="cvo-block-header color {{$set_color_temp2 ?? '' }}"><span id="cvo-award-blocktitle">Giải thưởng, Chứng chỉ</span></div>
                    <div id="award-table" class="cvo-block-body">
                        <div class="row ">
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
                <div id="cvo-interest" class="cvo-block">
                    <div class="cvo-block-header color {{$set_color_temp2 ?? '' }}"><span id="cvo-interest-blocktitle">Sở thích</span></div>
                    @if ($createCv)
                    <input placeholder="Đọc sách" name="hobit" value="{{$hobit ?? ''}}" class="design-input input-tem">
                    @else
                    <div>{{ $hobit }}</div>
                    <div style="clear: both"></div>
                    @endif
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="cvo-award" class="cvo-block" style="margin-left: 15px;">
        <div class="cvo-block-header color {{$set_color_temp2 ?? '' }}"><span id="cvo-award-blocktitle">Blog</span></div>

        @foreach ($categoryPost as $category)
        @if (!$category->posts->isEmpty())
        <div>Category: {{ $category->title }}</div>
        <div id="award-table" class="cvo-block-body">
            <ul>
                @foreach ($category->posts as $post)
                <li class="design_link" style="margin-top: 10px;">
                    <a href="{{ route('userPost', [
                                        'userName' => $userId,
                                        'postId' => $post->id   
                                    ]) }}">{{ $post->title }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        @endforeach
        <div style="clear: both"></div>
    </div>
    <div class="section-line"></div>
</div>