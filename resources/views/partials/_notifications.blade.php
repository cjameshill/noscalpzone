<section class="section notifications-hold is-fixed">
    <transition-group name="bounce" tag="div" class="columns is-multiline">
        <notification class="animated" v-for="(notification, index) in notifications" @close="notifications.splice(index, 1)" :key="index" :index="notification" :type="notification.type" :body="notification.body"></notification>
    </transition-group>
</section>


@if (session()->has('flash_notification.message'))
    @if (session()->has('flash_notification.overlay'))
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => session('flash_notification.title'),
            'body'       => session('flash_notification.message')
        ])
    @else
        <section class="section notifications-hold is-fixed notification-php">
            <div class="columns is-multiline">
                <div class="column is-12">
                    <div class="
                    notification center-row has-text-centered animated animatedSlide bounceInDown
                    {{ session('flash_notification.level') }}
                    {{ session('flash_notification.important') }}
                            ">
                        <span class="title is-4">{!! session('flash_notification.message') !!}</span>

                        @if(session()->has('flash_notification.important'))
                            <button class="button is-large is-outlined">Ok</button>
                        @endif

                    </div>
                </div>
            </div>
        </section>
    @endif
@endif