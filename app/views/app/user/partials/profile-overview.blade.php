<ul class="list-unstyled mb-0 profile-overview-menus">
    <li class="py-2 mx-2 mb-1 profile-overview-menu profile-overview-switch active" data-target-block="#profileDetails">
        <a href="javascript:void(0)" class="text-muted d-flex align-items-center">
            <i class="ph-duotone ph-user h5 me-2"></i>
            <span>Profil</span>
        </a>
    </li>

    <!-- Parol -->
    <li class="py-2 mx-2 mb-1 profile-overview-menu profile-overview-switch" data-target-block="#passwordDetails">
        <a href="javascript:void(0)" class="text-muted d-flex align-items-center">
            <i class="ph-duotone ph-key h5 me-2"></i>
            <span>Parol</span>
        </a>
    </li>

    <!-- Xavfsizlik -->
    <li class="py-2 mx-2 mb-1 profile-overview-menu profile-overview-switch" data-target-block="#securityDetails">
        <a href="javascript:void(0)" class="text-muted d-flex align-items-center">
            <i class="ph-duotone ph-shield-check h5 me-2"></i>
            <span>Xavfsizlik</span>
        </a>
    </li>

    <li class="py-2 mx-2 mb-1 profile-overview-menu">
        <a href="{{ route('logout') }}" class="text-danger fw-bold d-flex align-items-center">
            <i class="ph-duotone ph-sign-out text-danger h5 me-2"></i>
            <span>Chiqish</span>
        </a>
    </li>
</ul>
