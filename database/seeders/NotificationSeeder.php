<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $text = <<<EOT
            <p>Throughout the late 1950s and into the 1960s, the United States and the Soviet Union had been developing missile systems with the ability to shoot down incoming <a title="Intercontinental ballistic missile" href="https://en.wikipedia.org/wiki/Intercontinental_ballistic_missile">Intercontinental ballistic missile</a> (ICBM) warheads. During this period, the US considered the defense of the US as part of reducing the overall damage inflicted in a full nuclear exchange. As part of this defense, <a title="Canada" href="https://en.wikipedia.org/wiki/Canada">Canada</a> and the US established the North American Air Defense Command (now called <a title="NORAD" href="https://en.wikipedia.org/wiki/NORAD">North American Aerospace Defense Command</a>).</p>
            <p><img class="thumbimage" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/Carter_Brezhnev_sign_SALT_II.jpg/290px-Carter_Brezhnev_sign_SALT_II.jpg" alt="" width="290" height="196" data-file-width="630" data-file-height="425" /></p>
            <p>By the early 1950s, US research on the <a title="Project Nike" href="https://en.wikipedia.org/wiki/Project_Nike">Nike Zeus</a> missile system had developed to the point where small improvements would allow it to be used as the basis of an operational ABM system. Work started on a short-range, high-speed counterpart known as <a title="Sprint (missile)" href="https://en.wikipedia.org/wiki/Sprint_(missile)">Sprint</a> to provide defense for the ABM sites themselves. By the mid-1960s, both systems showed enough promise to start development of base selection for a limited ABM system dubbed <a class="mw-redirect" title="National Missile Defense" href="https://en.wikipedia.org/wiki/National_Missile_Defense#Sentinel_Program">Sentinel</a>. In 1967, the US announced that Sentinel itself would be scaled down to the smaller and less expensive <a title="Safeguard Program" href="https://en.wikipedia.org/wiki/Safeguard_Program">Safeguard</a>. Soviet doctrine called for development of its own ABM system and return to strategic parity with the US. This was achieved with the operational deployment of the <a title="A-35 anti-ballistic missile system" href="https://en.wikipedia.org/wiki/A-35_anti-ballistic_missile_system">A-35 ABM system</a> and its successors, which remain operational to this day.</p>
            <p><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/NIKE_Zeus.jpg/300px-NIKE_Zeus.jpg" alt="NIKE Zeus.jpg" width="300" height="380" data-file-width="372" data-file-height="471" /></p>
            <p>The development of multiple independently targetable reentry vehicle (<a class="mw-redirect" title="MIRV" href="https://en.wikipedia.org/wiki/MIRV">MIRV</a>) systems allowed a single ICBM to deliver as many as ten separate warheads at a time. An ABM defense system could be overwhelmed with the sheer number of warheads.<sup id="cite_ref-4" class="reference"><a href="https://en.wikipedia.org/wiki/Anti-Ballistic_Missile_Treaty#cite_note-4">[4]</a></sup> Upgrading it to counter the additional warheads would be economically unfeasible: The defenders required one rocket per incoming warhead, whereas the attackers could place 10 warheads on a single missile at a reasonable cost. To further protect against ABM systems, the Soviet MIRV missiles were equipped with decoys; <a title="R-36 (missile)" href="https://en.wikipedia.org/wiki/R-36_(missile)">R-36M</a> heavy missiles carried as many as 40.<sup id="cite_ref-Decoys_5-0" class="reference"><a href="https://en.wikipedia.org/wiki/Anti-Ballistic_Missile_Treaty#cite_note-Decoys-5">[5]</a></sup> These decoys would appear as warheads to an ABM, effectively requiring engagement of five times as many targets and rendering defense even less effective.</p>
        EOT;

        Notification::create([
            'receiver_id' => 1,
            'title' => 'Welcome!',
            'msg' => $text,
        ]);

        Notification::create([
            'receiver_id' => 2,
            'title' => 'Welcome!',
            'msg' => $text,
        ]);

        Notification::create([
            'receiver_id' => 3,
            'title' => 'Welcome!',
            'msg' => $text,
        ]);
    }
}