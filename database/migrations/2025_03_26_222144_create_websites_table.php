<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('status');
            

            $table->string('company_name')->nullable(); // Nom de l'entreprise
            $table->string('domain_name'); // Nom du domaine
            $table->string('registrar')->nullable(); // Registrar (ex : GoDaddy, Namecheap)
            $table->string('whois_server')->nullable(); // Serveur WHOIS utilisé
            $table->string('registrant_name')->nullable(); // Nom du registrant
            $table->string('registrant_organization')->nullable(); // Organisation du registrant
            $table->string('registrant_email')->nullable(); // Email du registrant
            $table->string('registrant_phone')->nullable(); // Téléphone du registrant
            $table->string('registrant_country')->nullable(); // Pays du registrant
            $table->text('dnssec')->nullable(); // Informations DNSSEC
            $table->json('name_servers')->nullable(); // Liste des serveurs de noms (ex : ns1, ns2)
            $table->string('status')->nullable(); // Statut du domaine (ex : Active, Expired)
            $table->date('creation_date')->nullable(); // Date de création du domaine
            $table->date('expiration_date')->nullable(); // Date d'expiration du domaine
            $table->date('updated_date')->nullable(); // Dernière mise à jour du domaine
            $table->text('raw_data')->nullable(); // Données brutes du WHOIS, au cas où tout ne serait pas analysé
            $table->text('trackers_detected')->nullable();
            $table->text('cookies_detected')->nullable();
            $table->text('non_compliant_cookies')->nullable();
            $table->text('forms_detected')->nullable();
            $table->text('legal_mentions_present')->nullable();
            $table->text('cookie_consent_button')->nullable();
            $table->text('privacy_policy_link_valid')->nullable();
            $table->text('recommendations')->nullable();
           
           
           
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('websites');
    }
};
