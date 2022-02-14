<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataFill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            INSERT INTO public.colors (name, created_at, updated_at) VALUES
('červené', '2008-11-20 00:00:00', '2021-11-20 00:00:00'),
('modrá', '2008-11-20 00:00:00', '2021-11-20 00:00:00'),
('zelená', '2008-11-20 00:00:00', '2021-11-20 00:00:00');
");

        DB::statement("
             INSERT INTO public.products (created_at, updated_at, name, description, price, type, quantity) VALUES
  ('2021-12-05 19:02:39', '2021-12-05 19:02:39', 'Damaškový nôž Tyrkenit', 'Damaškový nôž s výplňou z tyrkenit, drahého opálu a mosadzných ostružliniek.', 49.99, 'Noze', 1),
  ('2021-12-05 19:04:32', '2021-12-05 19:04:32', 'Svietivý Azurit', 'Náušncie s azuritom, svietiovým práškom a kúskami kovu', 19.99, 'Nausnice', 2),
  ('2021-12-05 19:05:46', '2021-12-05 19:05:46', 'Malachit & Pyrit', 'Náušnice s malachitom a pyritom', 15.99, 'Nausnice', 4),
  ('2021-12-05 19:08:03', '2021-12-05 19:08:03', 'Svietivý Apatit & Pyrit', 'Náušnice s apatitom, pyritom a modrým svietivým práškom.', 16.99, 'Nausnice', 6),
  ('2021-12-05 19:09:32', '2021-12-05 19:09:32', 'Svietivý Tyrkenit', 'Náušnice s tyrkenitom a svietivým práškom červeno oranžovej farby.', 17.99, 'Nausnice', 2),
  ('2021-12-05 19:10:58', '2021-12-05 19:10:58', 'Tyrkenit & Drahý opál', 'Náušnice s tyrkenitom, drahým opálom a mosadznými ostružlinkami.', 21.99, 'Nausnice', 4),
  ('2021-12-05 19:12:13', '2021-12-05 19:12:13', 'Tyrkenit & Mosadz', 'Náušnice s tyrkenitom, mosadznými ostružlinkami a žltým svietiacim práškom.', 20.99, 'Nausnice', 8),
  ('2021-12-05 19:14:06', '2021-12-05 19:14:06', 'Drahý opál & Kov', 'Náušnice s drahým opálom, kúskami kovu a mosadznými ostružlinkami na oranžovom svietiacom podklade', 23.99, 'Nausnice', 6),
  ('2021-12-05 19:15:06', '2021-12-05 19:15:06', 'Apatit & Drahý opál', 'Náušnice s apatitom, drahým opálom a mosadznými ostružlinkami na svietiacom podklade.', 29.99, 'Nausnice', 10),
  ('2021-12-05 19:16:53', '2021-12-05 19:16:53', 'Chryzokol & Drahý opál - červené', 'Náušnice s chryzokolom, drahým opálom na červenom podklade', 28.99, 'Nausnice', 9),
  ('2021-12-05 19:18:11', '2021-12-05 19:18:11', 'Chryzokol & Drahý opál - ružové', 'Náušnice s chryzokolom, drahým opálom na ružovom podklade.', 27.99, 'Nausnice', 3),
  ('2021-12-05 19:19:32', '2021-12-05 19:19:32', 'Chryzokol & Drahý opál - biele svietiace', 'Náušnice s chryzokolom, drahým opálom na bielom svietiacom podklade zelenomodrej farby.', 32.99, 'Nausnice', 5),
  ('2021-12-05 19:22:07', '2021-12-05 19:22:07', 'Apatit & Drahý opál', 'Prívesok s apatitom, drahým opálom a mosadznými ostružlinkami. Je rôzny na každej strane.', 39.99, 'Privesky', 1),
  ('2021-12-05 19:23:21', '2021-12-05 19:23:21', 'Srdce- Apatit', 'Prívesok v tvare srdca s apatitom, kúskami kovu a svietivým práškom zelenomodrej farby.', 41.99, 'Privesky', 1),
  ('2021-12-05 19:24:46', '2021-12-05 19:24:46', 'Srdce- Apatiti & Drahý opál', 'Prívesok s apatitom, drahým opálom, mosadznými ostružlinkami na svietivom podklade modrej farby.', 45.99, 'Privesky', 1),
  ('2021-12-05 19:25:44', '2021-12-05 19:25:44', 'Chryzokol & Drahý opál - zelené', 'Náušnice s chryzokolom, drahým opálom na zelenom svietiacom podklade.', 22.99, 'Nausnice', 4);
");

        DB::statement("
            INSERT INTO public.color_product (color_id, product_id, created_at, updated_at) VALUES
(2, 1, '2021-12-05 19:02:39', '2021-12-05 19:02:39'),
(2, 2, '2021-12-05 19:04:32', '2021-12-05 19:04:32'),
(3, 3, '2021-12-05 19:05:46', '2021-12-05 19:05:46'),
(2, 4, '2021-12-05 19:08:03', '2021-12-05 19:08:03'),
(1, 5, '2021-12-05 19:09:32', '2021-12-05 19:09:32'),
(2, 5, '2021-12-05 19:09:32', '2021-12-05 19:09:32'),
(2, 6, '2021-12-05 19:10:58', '2021-12-05 19:10:58'),
(2, 7, '2021-12-05 19:12:13', '2021-12-05 19:12:13'),
(1, 8, '2021-12-05 19:14:06', '2021-12-05 19:14:06'),
(2, 9, '2021-12-05 19:15:06', '2021-12-05 19:15:06'),
(1, 10, '2021-12-05 19:16:53', '2021-12-05 19:16:53'),
(2, 10, '2021-12-05 19:16:53', '2021-12-05 19:16:53'),
(2, 11, '2021-12-05 19:18:11', '2021-12-05 19:18:11'),
(2, 12, '2021-12-05 19:19:32', '2021-12-05 19:19:32'),
(3, 12, '2021-12-05 19:19:32', '2021-12-05 19:19:32'),
(2, 13, '2021-12-05 19:22:07', '2021-12-05 19:22:07'),
(2, 14, '2021-12-05 19:23:21', '2021-12-05 19:23:21'),
(2, 15, '2021-12-05 19:24:46', '2021-12-05 19:24:46'),
(2, 16, '2021-12-05 19:25:44', '2021-12-05 19:25:44'),
(3, 16, '2021-12-05 19:25:44', '2021-12-05 19:25:44');
");

        DB::statement("
                     INSERT INTO public.addresses (name, surname, city, street, house_number, state, zip, phone, updated_at, created_at) VALUES
('Julia', 'Slavkovská', 'Poprad', 'klincova', '160', 'slovensko', '05912', '0903056529', '2021-12-05 18:08:04', '2021-12-05 18:08:04'),
('Roland', 'Vdovják', 'Liptovksý Mikuláš', 'Nová', '12', 'Slovensko', '05913', '0904158753', '2021-12-05 21:17:53', '2021-12-05 21:17:53');
");



        DB::statement("
             INSERT INTO public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at, address_id) VALUES
  (1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$/P.AGzugFQJOCIyBQ4Q.lungbms.Lxb8210mo4F7jR91YXgPBLgg6', NULL, '2021-12-05 18:10:02', '2021-12-05 18:10:02', NULL),
  (2, 'Julia', 'julia@gmail.com', NULL, '$2y$10$/P.AGzugFQJOCIyBQ4Q.lungbms.Lxb8210mo4F7jR91YXgPBLgg6', NULL, '2021-12-05 18:00:44', '2021-12-05 18:00:44', 1),
  (3, 'Roland', 'roland@gmail.com', NULL, '$2y$10$/P.AGzugFQJOCIyBQ4Q.lungbms.Lxb8210mo4F7jR91YXgPBLgg6', NULL, '2021-12-05 21:10:31', '2021-12-05 21:10:31', 2);

");


        DB::statement("
                      INSERT INTO public.images (created_at, updated_at, file, product_id) VALUES
 ('2021-12-05 19:02:39', '2021-12-05 19:02:39', '110-845dc6acd215bdf6f2321732d2e0abe01638730959.jpg', 1),
 ('2021-12-05 19:02:39', '2021-12-05 19:02:39', '110-978328e212a9c6d52e486ec1e0bb68ca1638730959.jpg', 1),
 ('2021-12-05 19:02:39', '2021-12-05 19:02:39', '110-fbff23936b16569ca2c995a0bc38a2791638730959.jpg', 1),
 ('2021-12-05 19:04:32', '2021-12-05 19:04:32', '111-26cb40723d689f9d2cfbeeb40376fe2b1638731072.jpg', 2),
 ('2021-12-05 19:04:32', '2021-12-05 19:04:32', '111-89ff96bf8e51b7dd1611d530bbd14b511638731072.jpg', 2),
 ('2021-12-05 19:05:46', '2021-12-05 19:05:46', '112-d0a52e9f8d425cdb7bfe8874f2f6de271638731146.jpg', 3),
 ('2021-12-05 19:05:46', '2021-12-05 19:05:46', '112-0c546c5e55da703aa38c51a365ce11c51638731146.jpg', 3),
 ('2021-12-05 19:05:46', '2021-12-05 19:05:46', '112-f7c3206913e0392fbd1345740e6561251638731146.jpg', 3),
 ('2021-12-05 19:08:03', '2021-12-05 19:08:03', '113-982b9d18466d90b9586e739ea980fc9e1638731283.jpg', 4),
 ('2021-12-05 19:08:03', '2021-12-05 19:08:03', '113-4474583a95b4c8025d6b5820b9ff375f1638731283.jpg', 4),
 ('2021-12-05 19:08:03', '2021-12-05 19:08:03', '113-4bb1348e7b40d82619aa792aa223e7251638731283.jpg', 4),
 ('2021-12-05 19:09:32', '2021-12-05 19:09:32', '114-420ff2b1e2d02a5bceeb965dc72ca6071638731372.jpg', 5),
 ('2021-12-05 19:09:32', '2021-12-05 19:09:32', '114-d678dc9c7f3023cbfc26e47702f0b2561638731372.jpg', 5),
 ('2021-12-05 19:09:32', '2021-12-05 19:09:32', '114-879a2a73247a106db9e11884bae6495d1638731372.jpg', 5),
 ('2021-12-05 19:10:58', '2021-12-05 19:10:58', '115-82c749fd7f90fcab0183d81e00dba5c41638731458.jpg', 6),
 ('2021-12-05 19:10:58', '2021-12-05 19:10:58', '115-0475cbf47faf2d3a721ccc9e7a138cfa1638731458.jpg', 6),
 ('2021-12-05 19:12:13', '2021-12-05 19:12:13', '116-a35ab4de67b80567d9ffbd8140aa03501638731533.jpg', 7),
 ('2021-12-05 19:12:13', '2021-12-05 19:12:13', '116-f705b8ae5a7f02b01af958136eaf73f01638731533.jpg', 7),
 ('2021-12-05 19:14:06', '2021-12-05 19:14:06', '117-f95a9d6dad08fa09f0af1d97e28c0b6e1638731646.jpg', 8),
 ('2021-12-05 19:14:06', '2021-12-05 19:14:06', '117-9df78864cc023fb50a3c30df5d809c001638731646.jpg', 8),
 ('2021-12-05 19:14:06', '2021-12-05 19:14:06', '117-6d851ab3add083a0495ec4180d02c42c1638731646.jpg', 8),
 ('2021-12-05 19:15:06', '2021-12-05 19:15:06', '118-b35c0a0341e89d4ff22319bed8d07bab1638731706.jpg', 9),
 ('2021-12-05 19:15:18', '2021-12-05 19:15:18', '118-4a47c636fb47925625dec406eb20cae61638731718.jpg', 9),
 ('2021-12-05 19:16:53', '2021-12-05 19:16:53', '119-a32a402fbe56064a37df3db953f344dc1638731813.jpg', 10),
 ('2021-12-05 19:16:53', '2021-12-05 19:16:53', '119-67c2f9bf98b9746e287cf1c60ec22a7c1638731813.jpg', 10),
 ('2021-12-05 19:18:11', '2021-12-05 19:18:11', '120-7a058401b9cd53c3d8f0183e6bce52bf1638731891.jpg', 11),
 ('2021-12-05 19:18:11', '2021-12-05 19:18:11', '120-be3a28e1583ae93fc6ed70b3be65f55b1638731891.jpg', 11),
 ('2021-12-05 19:19:32', '2021-12-05 19:19:32', '121-e98fca24e4ea2113cbe2712321bc028d1638731972.jpg', 12),
 ('2021-12-05 19:19:32', '2021-12-05 19:19:32', '121-37460e01ae161f055491be20798e643f1638731972.jpg', 12),
 ('2021-12-05 19:22:07', '2021-12-05 19:22:07', '122-ca0a6df05272c95b6eccd772248ddb161638732127.jpg', 13),
 ('2021-12-05 19:22:07', '2021-12-05 19:22:07', '122-4f2f279cb33d264de2d493c3461294621638732127.jpg', 13),
 ('2021-12-05 19:22:07', '2021-12-05 19:22:07', '122-e988eb3a6b6df7e762b4186fb0d4baca1638732127.jpg', 13),
 ('2021-12-05 19:23:21', '2021-12-05 19:23:21', '123-23d8f58e30ee0efd0f0f609b08c5b48d1638732201.jpg', 14),
 ('2021-12-05 19:23:21', '2021-12-05 19:23:21', '123-32ef3f5de41497082f5790b908e7483a1638732201.jpg', 14),
 ('2021-12-05 19:24:46', '2021-12-05 19:24:46', '124-3c08211640991d2bc3d0018771a214541638732286.jpg', 15),
 ('2021-12-05 19:25:44', '2021-12-05 19:25:44', '125-51df4ed3a155c789dd20c7b4d13a844b1638732344.jpg', 16),
 ('2021-12-05 19:25:44', '2021-12-05 19:25:44', '125-3cb3ce478f9c90407d16c30aed21d31b1638732344.jpg', 16);
");

        DB::statement("
            INSERT INTO public.roles (name, description, created_at, updated_at) VALUES ('ADMIN', 'ADMIN role', NULL, NULL);
");

        DB::statement("
             INSERT INTO public.role_user (role_id, user_id, created_at, updated_at) VALUES (1, 1, NULL, NULL);
");




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
