@props(["name"])

@if($name === 'down-arrow')
    <svg {{$attributes(['class' => "transform -rotate-90"])}} width="22" height="22" viewBox="0 0 22 22">
        <g fill="none" fill-rule="evenodd">
            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
            </path>
            <path fill="#222"
                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
        </g>
    </svg>
@endif

@if($name === 'eye')
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
    </svg>
@endif

@if($name === 'heart')
    <input type="checkbox" id="checkbox" />
    <label for="checkbox">
        <svg class="heart" id="heart-svg" width="38" height="38" viewBox="467 392 58 57"  xmlns="http://www.w3.org/2000/svg">
            <g id="Group" fill="none" fill-rule="evenodd" transform="translate(467 392)">
                <path d="M29.144 20.773c-.063-.13-4.227-8.67-11.44-2.59C7.63 28.795 28.94 43.256 29.143 43.394c.204-.138 21.513-14.6 11.44-25.213-7.214-6.08-11.377 2.46-11.44 2.59z" id="heart" fill="#AAB8C2"/>
                <circle id="main-circ" fill="#E2264D" opacity="0" cx="29.5" cy="29.5" r="1.5"/>

                <g id="grp7" opacity="0" transform="translate(7 6)">
                    <circle id="oval1" fill="#9CD8C3" cx="2" cy="6" r="2"/>
                    <circle id="oval2" fill="#8CE8C3" cx="5" cy="2" r="2"/>
                </g>

                <g id="grp6" opacity="0" transform="translate(0 28)">
                    <circle id="oval1" fill="#CC8EF5" cx="2" cy="7" r="2"/>
                    <circle id="oval2" fill="#91D2FA" cx="3" cy="2" r="2"/>
                </g>

                <g id="grp3" opacity="0" transform="translate(52 28)">
                    <circle id="oval2" fill="#9CD8C3" cx="2" cy="7" r="2"/>
                    <circle id="oval1" fill="#8CE8C3" cx="4" cy="2" r="2"/>
                </g>

                <g id="grp2" opacity="0" transform="translate(44 6)">
                    <circle id="oval2" fill="#CC8EF5" cx="5" cy="6" r="2"/>
                    <circle id="oval1" fill="#CC8EF5" cx="2" cy="2" r="2"/>
                </g>

                <g id="grp5" opacity="0" transform="translate(14 50)">
                    <circle id="oval1" fill="#91D2FA" cx="6" cy="5" r="2"/>
                    <circle id="oval2" fill="#91D2FA" cx="2" cy="2" r="2"/>
                </g>

                <g id="grp4" opacity="0" transform="translate(35 50)">
                    <circle id="oval1" fill="#F48EA7" cx="6" cy="5" r="2"/>
                    <circle id="oval2" fill="#F48EA7" cx="2" cy="2" r="2"/>
                </g>

                <g id="grp1" opacity="0" transform="translate(24)">
                    <circle id="oval1" fill="#9FC7FA" cx="2.5" cy="3" r="2"/>
                    <circle id="oval2" fill="#9FC7FA" cx="7.5" cy="2" r="2"/>
                </g>
            </g>
        </svg>
    </label>

@endif

