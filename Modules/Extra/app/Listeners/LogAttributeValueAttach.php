<?php
namespace Modules\Extra\Listeners;

use Modules\Extra\Events\AttributeValueAttached;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LogAttributeValueAttach
{
    public function handle(AttributeValueAttached $event): void
    {
        // Log::info('🔥 Listener reached with values: ', $event->valueIds);

        $now = now();
        $records = collect($event->valueIds)->map(function ($valueId) use ($event, $now) {
            return [
                'attribute_id' => $event->attribute->id,
                'value_id'     => $valueId,
                'creator_type' => Auth::user()::class,
                'creator_id'   => Auth::id(),
                'status'       => 'active',
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        })->toArray();
        DB::table('attribute_value')->insert($records);


        // foreach ($event->valueIds as $valueId) {
        //     DB::table('attribute_value')
        //         ->insert([
        //             'attribute_id' => $event->attribute->id,
        //             'value_id'     => $valueId,
        //             'creator_type' => Auth::user()::class,
        //             'creator_id'   => Auth::id(),
        //             'created_at'   => now(),
        //             'updated_at'   => now(),
        //         ]);
        // }
    }
}