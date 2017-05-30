SELECT
  u.`id`,
  u.`email`,
  u.`prenom`,
  u.`nom`,
  u.`id_type_utilisateur`,
  tu.`label`,
  c.`label`
FROM
  `utilisateur` as u
LEFT JOIN `type_utilisateur` as tu ON u.id_type_utilisateur = tu.id
RIGHT JOIN `color` as c ON tu.id_color = c.id
WHERE
  1