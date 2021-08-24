<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComplaintsSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('complaints')->insertOrIgnore([
            [
                'name' => 'Denúncia teste',
                'description' => 'Teste de descrição',
                'is_solved' => false,
                'latitude' => -25.4060677,
                'longitude' => -51.488928517,
                'requester_user_id' => \App\Repositories\UserRepository::new()->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('addresses')->insertOrIgnore([
            [
                'state_id' => 41,
                'city_id' => 4109401,
                'type' => 'Principal',
                'street_avenue' => 'Rua Carlos Luz',
                'number' => '128',
                'complement' => 'casa',
                'district' => 'Boqueirão',
                'cep' => '85020-400',
                'complaint_id' => \App\Repositories\ComplaintRepository::new()->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $complaint = \App\Repositories\ComplaintRepository::new()->first();
        $complaint->addMediaFromUrl('https://s2.glbimg.com/fW_E6r9xm05EiHU0O-gDXz51ITk=/0x0:900x581/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2017/t/T/ouRvKySv29MxKZLSpAow/rua-rio-de-janeiro-foi-recuperada-no-comeco-do-ano-mas-chuvas-e-despejo-irregular-de-agua-danificaram-o-asfalto.jpg')
            ->toMediaCollection('media');

        $complaint->save();
    }
}
