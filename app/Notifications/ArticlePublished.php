<?php

namespace App\Notifications;
use App\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\FacebookPoster\FacebookPosterChannel;
use NotificationChannels\FacebookPoster\FacebookPosterPost;



class ArticlePublished extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [FacebookPosterChannel::class];
    }

   /**
     * @param $blog
     */
    public function toFacebookPoster($blog)
    {
        return with(new FacebookPosterPost($blog->title))
        //->withImage(url('https://media-cdn.tripadvisor.com/media/attractions-splice-spp-540x360/07/be/b9/f2.jpg'))
        ->withLink('https://www.tripadvisor.com.mx/AttractionProductReview-g294476-d17807567-Relaxing_at_the_Hot_Spring_with_our_Thermas_Tour-San_Salvador_San_Salvador_Departm.html');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
