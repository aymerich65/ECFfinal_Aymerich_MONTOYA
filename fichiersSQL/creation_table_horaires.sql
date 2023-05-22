CREATE TABLE horaires (
    jour VARCHAR(10) NOT NULL PRIMARY KEY,
    statut VARCHAR(10),
    ouverture_midi TIME NULL DEFAULT '00:00',
    fermeture_midi TIME NULL DEFAULT '00:00',
    ouverture_soir TIME NULL DEFAULT '00:00',
    fermeture_soir TIME NULL DEFAULT '00:00'
);
