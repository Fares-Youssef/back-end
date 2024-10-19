<div class="sidebar__menu-group">
    <ul class="sidebar_nav">
        <li>
            <a href="{{ route('index') }}" class="{{ Request::is('/') ? 'active' : '' }}">
                <span class="nav-icon uil uil-create-dashboard"></span>
                <span class="menu-text">قاعدة البيانات</span>
            </a>
        </li>
        <li>
            <a href="{{ route('contracts.index') }}" class="{{ Request::is('contracts*') ? 'active' : '' }}">
                <span class="nav-icon uil uil-clipboard-notes"></span>
                <span class="menu-text">العقود</span>
            </a>
        </li>
        <li>
            <a href="{{ route('due.index') }}" class="{{ Request::is('due*') ? 'active' : '' }}">
                <span class="nav-icon uil uil-bookmark"></span>
                <span class="menu-text">الاستحقاقات</span>
            </a>
        </li>
        <li>
            <a href="{{ route('electric.index') }}" class="{{ Request::is('electric*') ? 'active' : '' }}">
                <span class="nav-icon uil uil-lightbulb-alt"></span>
                <span class="menu-text">الكهرباء</span>
            </a>
        </li>
        <li>
            <a href="{{ route('waters.index') }}" class="{{ Request::is('waters*') ? 'active' : '' }}">
                <span class="nav-icon uil uil-flip-h"></span>
                <span class="menu-text">المياه</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user.index') }}" class="{{ Request::is('user*') ? 'active' : '' }}">
                <span class="nav-icon uil uil-users-alt"></span>
                <span class="menu-text">ادارة المستخدمين</span>
            </a>
        </li>
        <li class="has-child {{ Request::is(['details*', 'cities*', 'time*', 'types*']) ? 'open' : '' }}">
            <a href="#" class="{{ Request::is(['details*', 'cities*', 'time*', 'types*']) ? 'active' : '' }}">
                <span class="nav-icon uil uil-cog"></span>
                <span class="menu-text">{{ __('الاعدادات') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul style="top: 87px; left: 212px; display: none;">
                <li class="{{ Request::is('cities*') ? 'active' : '' }}">
                    <a href="{{ route('cities.index') }}">
                        <span class="menu-text">{{ __('المدن') }}</span>
                    </a>
                </li>
                <li class="{{ Request::is('details*') ? 'active' : '' }}">
                    <a href="{{ route('details.index') }}">
                        <span class="menu-text">{{ __('نوع العقد') }}</span>
                    </a>
                </li>
                <li class="{{ Request::is('time*') ? 'active' : '' }}">
                    <a href="{{ route('time.index') }}">
                        <span class="menu-text">{{ __('تفاصيل العقد') }}</span>
                    </a>
                </li>
                <li class="{{ Request::is('types*') ? 'active' : '' }}">
                    <a href="{{ route('types.index') }}">
                        <span class="menu-text">{{ __('نوع العقار') }}</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
