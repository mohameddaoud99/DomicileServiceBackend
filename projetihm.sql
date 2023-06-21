-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 14 mai 2023 à 22:52
-- Version du serveur : 5.7.24
-- Version de PHP : 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetihm`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reparateur_id` bigint(20) UNSIGNED NOT NULL,
  `demandeur_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `message`, `reparateur_id`, `demandeur_id`, `created_at`, `updated_at`) VALUES
(1, 'rue gabes km7', 1, 2, '2023-05-14 18:04:20', '2023-05-14 18:04:20'),
(2, 'aaaaaa', 1, 1, '2023-05-14 19:12:36', '2023-05-14 19:12:36'),
(3, 'aaaaa', 2, 1, '2023-05-14 19:52:41', '2023-05-14 19:52:41'),
(4, 'hiii', 6, 1, '2023-05-14 19:52:55', '2023-05-14 19:52:55');

-- --------------------------------------------------------

--
-- Structure de la table `demandeservice`
--

CREATE TABLE `demandeservice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `demandeur_id` bigint(20) UNSIGNED NOT NULL,
  `reparateur_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `demandeservice`
--

INSERT INTO `demandeservice` (`id`, `etat`, `date`, `demandeur_id`, `reparateur_id`, `created_at`, `updated_at`) VALUES
(1, 'R', '2023-05-16', 1, 1, '2023-05-14 14:13:53', '2023-05-14 14:13:53'),
(2, 'R', '2023-05-31', 2, 1, '2023-05-14 15:45:01', '2023-05-14 15:45:01'),
(3, 'A', '2023-05-25', 1, 1, '2023-05-14 16:31:08', '2023-05-14 16:31:08'),
(4, 'A', '2023-05-24', 1, 3, '2023-05-14 16:32:12', '2023-05-14 16:32:12'),
(5, 'E', '2023-05-06', 1, 1, '2023-05-14 21:47:05', '2023-05-14 21:47:05'),
(6, 'E', '2023-05-09', 1, 1, '2023-05-14 21:47:16', '2023-05-14 21:47:16'),
(7, 'E', '2023-05-26', 1, 1, '2023-05-14 21:47:19', '2023-05-14 21:47:19');

-- --------------------------------------------------------

--
-- Structure de la table `demandeur`
--

CREATE TABLE `demandeur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `demandeur`
--

INSERT INTO `demandeur` (`id`, `nom`, `prenom`, `adresse`, `email`, `telephone`, `ville`, `password`, `created_at`, `updated_at`) VALUES
(1, 'mohamed', 'daoud', 'route mahdia', 'djo@gmail.com', '55236985', 'Sfax', '87654321', '2023-05-14 14:09:56', '2023-05-14 14:09:56'),
(2, 'ayat', 'ayat', 'route mahdia', 'ayat@gmail.com', '23698521', 'Tunis', '12345678', '2023-05-14 15:42:13', '2023-05-14 15:42:13');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `valeur` int(11) NOT NULL,
  `reparateur_id` bigint(20) UNSIGNED NOT NULL,
  `demandeur_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `evaluation`
--

INSERT INTO `evaluation` (`id`, `valeur`, `reparateur_id`, `demandeur_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, '2023-05-14 14:21:48', '2023-05-14 14:21:48'),
(2, 5, 1, 2, '2023-05-14 15:46:26', '2023-05-14 15:46:26'),
(3, 1, 1, 2, '2023-05-14 15:46:36', '2023-05-14 15:46:36'),
(4, 1, 1, 2, '2023-05-14 15:46:42', '2023-05-14 15:46:42'),
(5, 1, 1, 2, '2023-05-14 15:46:48', '2023-05-14 15:46:48'),
(6, 4, 3, 1, '2023-05-14 16:32:18', '2023-05-14 16:32:18');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_17_083207_create_typeservice_table', 1),
(6, '2023_04_17_083208_create_reparateur_table', 1),
(7, '2023_04_17_083232_create_demandeur_table', 1),
(8, '2023_04_17_083247_create_demandeservice_table', 1),
(9, '2023_04_17_083316_create_utilisateur_table', 1),
(10, '2023_05_05_142702_create_evaluation_table', 1),
(11, '2023_05_14_184853_create_contact_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reparateur`
--

CREATE TABLE `reparateur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evaluation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TypeServiceID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reparateur`
--

INSERT INTO `reparateur` (`id`, `nom`, `prenom`, `adresse`, `email`, `telephone`, `ville`, `evaluation`, `password`, `TypeServiceID`, `created_at`, `updated_at`) VALUES
(1, 'Dali', 'Ghroubi', 'route mahdia', 'dali@gmail.com', '12345678', 'Sfax', '', '12345678', 1, NULL, NULL),
(2, 'salah', 'salah', 'sfax', 'salah@gmail.com', '23963852', 'Sfax', '', '12345678', 2, NULL, NULL),
(3, 'Daoud', 'Mohamed', 'Touzeur', 'mohamed@gmail.com', '23698745', 'Touzeur', '', '12345678', 1, NULL, NULL),
(4, 'iheb', 'mansour', 'Sfax', 'iheb@gmail.com', '23698745', 'Sfax', '', '12345678', 2, NULL, NULL),
(5, 'Mariam', 'Tounsi', 'Sousse', 'iheb@gmail.com', '23698745', 'Sousse', '', '12345678', 1, NULL, NULL),
(6, 'Rabeb', 'mansour', 'Ben Arous', 'rabeb@gmail.com', '23698745', 'Ben Arous', '', '12345678', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `typeservice`
--

CREATE TABLE `typeservice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomservice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `typeservice`
--

INSERT INTO `typeservice` (`id`, `nomservice`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Medecine', 'Medecine', NULL, NULL),
(2, 'Sport', 'Sport', NULL, NULL),
(3, 'Education', 'Education', NULL, NULL),
(4, 'Cuisine', 'Cuisine', NULL, NULL),
(5, 'Menuiserie', 'Menuiserie', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_demandeur_id_foreign` (`demandeur_id`),
  ADD KEY `contact_reparateur_id_foreign` (`reparateur_id`);

--
-- Index pour la table `demandeservice`
--
ALTER TABLE `demandeservice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `demandeservice_demandeur_id_foreign` (`demandeur_id`),
  ADD KEY `demandeservice_reparateur_id_foreign` (`reparateur_id`);

--
-- Index pour la table `demandeur`
--
ALTER TABLE `demandeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluation_demandeur_id_foreign` (`demandeur_id`),
  ADD KEY `evaluation_reparateur_id_foreign` (`reparateur_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `reparateur`
--
ALTER TABLE `reparateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reparateur_typeserviceid_foreign` (`TypeServiceID`);

--
-- Index pour la table `typeservice`
--
ALTER TABLE `typeservice`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `demandeservice`
--
ALTER TABLE `demandeservice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `demandeur`
--
ALTER TABLE `demandeur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reparateur`
--
ALTER TABLE `reparateur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `typeservice`
--
ALTER TABLE `typeservice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_demandeur_id_foreign` FOREIGN KEY (`demandeur_id`) REFERENCES `demandeur` (`id`),
  ADD CONSTRAINT `contact_reparateur_id_foreign` FOREIGN KEY (`reparateur_id`) REFERENCES `reparateur` (`id`);

--
-- Contraintes pour la table `demandeservice`
--
ALTER TABLE `demandeservice`
  ADD CONSTRAINT `demandeservice_demandeur_id_foreign` FOREIGN KEY (`demandeur_id`) REFERENCES `demandeur` (`id`),
  ADD CONSTRAINT `demandeservice_reparateur_id_foreign` FOREIGN KEY (`reparateur_id`) REFERENCES `reparateur` (`id`);

--
-- Contraintes pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_demandeur_id_foreign` FOREIGN KEY (`demandeur_id`) REFERENCES `demandeur` (`id`),
  ADD CONSTRAINT `evaluation_reparateur_id_foreign` FOREIGN KEY (`reparateur_id`) REFERENCES `reparateur` (`id`);

--
-- Contraintes pour la table `reparateur`
--
ALTER TABLE `reparateur`
  ADD CONSTRAINT `reparateur_typeserviceid_foreign` FOREIGN KEY (`TypeServiceID`) REFERENCES `typeservice` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
