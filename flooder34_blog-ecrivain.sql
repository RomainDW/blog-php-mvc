-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 12 fév. 2018 à 09:19
-- Version du serveur :  10.0.34-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `flooder34_blog-ecrivain`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admins`
--

CREATE TABLE `Admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` char(60) NOT NULL,
  `admin` int(11) DEFAULT NULL,
  `pseudo` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Admins`
--

INSERT INTO `Admins` (`id`, `email`, `password`, `admin`, `pseudo`) VALUES
(8, 'test@test.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 'Romain'),
(9, 'test@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 'test'),
(11, 'test@lol.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 'Lol'),
(12, 'lize@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 'Lize'),
(13, 'toto@toto.fr', '0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c', NULL, 'toto');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `seen` tinyint(11) NOT NULL DEFAULT '0',
  `signals` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `post_id`, `date`, `seen`, `signals`) VALUES
(77, 'Romain', 'Pas mal !', 40, '2018-02-07 14:42:15', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Posts`
--

CREATE TABLE `Posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `body` longtext NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'post.png',
  `createdDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Posts`
--

INSERT INTO `Posts` (`id`, `title`, `body`, `image`, `createdDate`) VALUES
(11, 'Chapitre 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Urna duis convallis convallis tellus. Lacus viverra vitae congue eu consequat ac. Volutpat ac tincidunt vitae semper. Fringilla ut morbi tincidunt augue interdum. Velit aliquet sagittis id consectetur purus ut faucibus pulvinar elementum. Nibh mauris cursus mattis molestie. Dictum non consectetur a erat nam at lectus urna. Ultricies mi eget mauris pharetra et ultrices neque ornare. Vel orci porta non pulvinar neque laoreet suspendisse. Arcu felis bibendum ut tristique et. Odio facilisis mauris sit amet massa vitae tortor condimentum. Ac turpis egestas integer eget aliquet nibh praesent. Viverra vitae congue eu consequat ac felis donec. Sit amet purus gravida quis. Pellentesque sit amet porttitor eget dolor morbi non arcu risus. Massa id neque aliquam vestibulum morbi. Cras adipiscing enim eu turpis egestas pretium. Ac felis donec et odio pellentesque diam volutpat commodo. Integer vitae justo eget magna fermentum iaculis eu non. Mi proin sed libero enim sed faucibus turpis in. Augue neque gravida in fermentum et sollicitudin ac orci. Malesuada fames ac turpis egestas sed tempus urna et pharetra. Posuere urna nec tincidunt praesent semper feugiat nibh. Dolor sit amet consectetur adipiscing elit duis. Turpis nunc eget lorem dolor sed viverra ipsum. Volutpat ac tincidunt vitae semper quis lectus nulla. Gravida quis blandit turpis cursus in hac habitasse platea. Nisl nunc mi ipsum faucibus vitae aliquet nec ullamcorper sit. Nec dui nunc mattis enim. Nunc pulvinar sapien et ligula ullamcorper malesuada proin libero nunc. Libero enim sed faucibus turpis. Senectus et netus et malesuada. Dolor sed viverra ipsum nunc aliquet bibendum. Fringilla urna porttitor rhoncus dolor purus. Cursus sit amet dictum sit amet justo donec enim diam. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Libero enim sed faucibus turpis in eu. Laoreet suspendisse interdum consectetur libero id faucibus nisl. Vel pharetra vel turpis nunc eget lorem. Vitae sapien pellentesque habitant morbi tristique. Tempus iaculis urna id volutpat. Mattis ullamcorper velit sed ullamcorper. Sit amet volutpat consequat mauris nunc congue nisi. Diam quis enim lobortis scelerisque fermentum. Tincidunt dui ut ornare lectus sit amet est. Consectetur adipiscing elit pellentesque habitant morbi. Est velit egestas dui id ornare arcu odio ut sem. Aliquam sem fringilla ut morbi. Orci porta non pulvinar neque laoreet suspendisse interdum consectetur. Mus mauris vitae ultricies leo integer malesuada. Dictum non consectetur a erat. Ac ut consequat semper viverra nam libero justo laoreet. Cras fermentum odio eu feugiat pretium nibh. Amet nisl suscipit adipiscing bibendum est ultricies integer. Egestas congue quisque egestas diam in arcu cursus. Sapien eget mi proin sed. Tortor id aliquet lectus proin nibh nisl condimentum. Sed viverra ipsum nunc aliquet bibendum enim facilisis. Curabitur vitae nunc sed velit dignissim sodales. Nunc eget lorem dolor sed viverra ipsum nunc aliquet. Molestie ac feugiat sed lectus vestibulum. Ut enim blandit volutpat maecenas volutpat blandit aliquam. Facilisi etiam dignissim diam quis enim lobortis. Purus non enim praesent elementum facilisis. Pharetra massa massa ultricies mi quis. Habitant morbi tristique senectus et netus. Dolor purus non enim praesent elementum facilisis leo vel fringilla. Ullamcorper eget nulla facilisi etiam dignissim. Est sit amet facilisis magna. Tellus orci ac auctor augue mauris augue neque gravida in. Cursus mattis molestie a iaculis at erat pellentesque adipiscing commodo. Sed velit dignissim sodales ut eu. Egestas purus viverra accumsan in nisl. Et ligula ullamcorper malesuada proin libero.</p>', 'jordan-mcqueen-4441.jpg', '2018-02-03 16:08:55'),
(24, 'Chapitre 2', '<p>Lorem <strong>ipsum</strong> dolor sit <em>amet</em>, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Egestas congue quisque egestas diam in arcu. Posuere morbi leo urna molestie at elementum eu. Nulla posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus. Est placerat in egestas erat imperdiet sed euismod nisi. Urna molestie at elementum eu facilisis sed odio. Justo nec ultrices dui sapien eget mi proin. Non curabitur gravida arcu ac tortor dignissim. Arcu risus quis varius quam quisque id diam vel. In nibh mauris cursus mattis molestie. Sit amet nisl suscipit adipiscing bibendum est. Mi quis hendrerit dolor magna. A erat nam at lectus. Egestas tellus rutrum tellus pellentesque eu tincidunt. Sed enim ut sem viverra aliquet eget sit amet tellus. Aenean sed adipiscing diam donec. Penatibus et magnis dis parturient montes nascetur. Laoreet sit amet cursus sit amet dictum. Nibh sed pulvinar proin gravida hendrerit lectus. Nec feugiat in fermentum posuere urna nec tincidunt praesent. Ut eu sem integer vitae justo eget magna fermentum iaculis. Arcu dictum varius duis at consectetur lorem donec. Sit amet est placerat in. Ipsum nunc aliquet bibendum enim facilisis gravida. Et ultrices neque ornare aenean euismod elementum nisi quis. Quisque id diam vel quam elementum pulvinar etiam. Faucibus scelerisque eleifend donec pretium vulputate. Eget magna fermentum iaculis eu. Facilisi morbi tempus iaculis urna. Rutrum tellus pellentesque eu tincidunt tortor. Porttitor rhoncus dolor purus non enim. Sed ullamcorper morbi tincidunt ornare massa eget egestas purus. Lacus luctus accumsan tortor posuere. Aliquam faucibus purus in massa tempor. Ac turpis egestas sed tempus urna et pharetra. Auctor augue mauris augue neque gravida in fermentum et. Dictum at tempor commodo ullamcorper a lacus vestibulum sed. Varius quam quisque id diam vel quam elementum. Lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque. Et pharetra pharetra massa massa ultricies mi. Condimentum mattis pellentesque id nibh tortor id. Donec massa sapien faucibus et. Id diam vel quam elementum. Ut consequat semper viverra nam libero justo laoreet. Quam nulla porttitor massa id neque aliquam vestibulum morbi. Fermentum leo vel orci porta non pulvinar neque laoreet. Mollis aliquam ut porttitor leo. Posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Sit amet mauris commodo quis imperdiet massa. Non pulvinar neque laoreet suspendisse interdum consectetur. Venenatis tellus in metus vulputate eu. Imperdiet proin fermentum leo vel orci porta. Velit scelerisque in dictum non. Id diam maecenas ultricies mi eget mauris pharetra et. Sollicitudin ac orci phasellus egestas tellus rutrum tellus. Morbi tempus iaculis urna id volutpat. Magna fringilla urna porttitor rhoncus dolor purus non enim praesent. Quam id leo in vitae. Amet consectetur adipiscing elit ut aliquam purus sit amet. In tellus integer feugiat scelerisque varius morbi. Leo vel orci porta non pulvinar neque. Magnis dis parturient montes nascetur ridiculus. Vitae sapien pellentesque habitant morbi tristique senectus et. Elit duis tristique sollicitudin nibh sit amet commodo nulla. Quam quisque id diam vel. Ut sem nulla pharetra diam sit amet nisl suscipit adipiscing. Non enim praesent elementum facilisis leo vel fringilla est. Malesuada fames ac turpis egestas. Elementum nisi quis eleifend quam adipiscing vitae proin. Amet tellus cras adipiscing enim. Id aliquet risus feugiat in ante metus dictum. Diam in arcu cursus euismod quis viverra. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae. Euismod in pellentesque massa placerat. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Sed egestas egestas fringilla phasellus faucibus. Nisi quis eleifend quam adipiscing vitae proin sagittis nisl. Eget nunc scelerisque viverra mauris. Erat nam at lectus urna duis convallis convallis tellus id. Suscipit adipiscing bibendum est ultricies integer. Malesuada proin libero nunc consequat interdum. Commodo quis imperdiet massa tincidunt nunc. In dictum non consectetur a erat nam at lectus urna.</p>', 'louis-pellissier-319.jpg', '2018-02-03 18:33:05'),
(40, 'Chapitre 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc sed id semper risus in hendrerit gravida. Nisl rhoncus mattis rhoncus urna neque viverra. Faucibus interdum posuere lorem ipsum dolor sit amet. Mattis ullamcorper velit sed ullamcorper morbi. Senectus et netus et malesuada fames. Vulputate odio ut enim blandit volutpat maecenas volutpat. Malesuada fames ac turpis egestas integer eget aliquet nibh praesent. Non arcu risus quis varius. Diam vulputate ut pharetra sit amet aliquam id diam. Nibh tortor id aliquet lectus proin nibh nisl condimentum. Sit amet cursus sit amet dictum sit amet.</p>\r\n<p><img class=\"\" src=\"static/source/petite%20image.jpg\" alt=\"\" width=\"245\" height=\"232\" /></p>\r\n<p>Egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Fermentum iaculis eu non diam. Ultrices sagittis orci a scelerisque purus semper. Ac turpis egestas sed tempus urna. Dui accumsan sit amet nulla facilisi. Aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc. Varius sit amet mattis vulputate enim nulla aliquet porttitor. Ullamcorper dignissim cras tincidunt lobortis feugiat. Vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt ornare. Nisl nunc mi ipsum faucibus vitae aliquet nec ullamcorper sit. Condimentum vitae sapien pellentesque habitant morbi tristique. Cras fermentum odio eu feugiat pretium nibh ipsum consequat nisl. Leo a diam sollicitudin tempor id eu nisl nunc mi. Neque volutpat ac tincidunt vitae semper quis lectus nulla.</p>\r\n<p>Quis blandit turpis cursus in hac habitasse platea dictumst quisque. Tincidunt vitae semper quis lectus nulla at volutpat. Sed sed risus pretium quam vulputate dignissim suspendisse in est. Duis at tellus at urna condimentum mattis. Volutpat lacus laoreet non curabitur gravida arcu ac tortor. Sed odio morbi quis commodo. In vitae turpis massa sed elementum tempus egestas. Dui ut ornare lectus sit amet. In pellentesque massa placerat duis ultricies. Accumsan lacus vel facilisis volutpat est velit egestas dui. Arcu cursus euismod quis viverra nibh cras pulvinar mattis. Cursus vitae congue mauris rhoncus aenean vel. Lacus luctus accumsan tortor posuere.</p>', 'trevor.jpg', '2018-02-07 13:41:04');

-- --------------------------------------------------------

--
-- Structure de la table `Votes`
--

CREATE TABLE `Votes` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `post_id` int(11) NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Votes`
--

INSERT INTO `Votes` (`id`, `comment_id`, `user_id`, `post_id`, `vote`) VALUES
(128, 77, 'test', 40, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Votes`
--
ALTER TABLE `Votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT pour la table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `Votes`
--
ALTER TABLE `Votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
