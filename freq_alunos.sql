-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/06/2024 às 19:39
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `freq_alunos`
--
CREATE DATABASE IF NOT EXISTS `freq_alunos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `freq_alunos`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `id_resp_aluno` int(11) NOT NULL,
  `id_curso_aluno` int(11) DEFAULT 0,
  `id_usuario_aluno` int(11) DEFAULT NULL,
  `nome_aluno` varchar(50) NOT NULL,
  `email_aluno` varchar(100) NOT NULL,
  `cpf_aluno` varchar(11) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `perfil` varchar(25) DEFAULT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `id_resp_aluno`, `id_curso_aluno`, `id_usuario_aluno`, `nome_aluno`, `email_aluno`, `cpf_aluno`, `matricula`, `perfil`, `endereco`, `data_nascimento`) VALUES
(1, 1, NULL, 5, 'Anivio Junior', 'junior6703@gmail.com', '04153424064', 'N7738510', 'Aluno', 'Rua jose lourenço nº 1140', '2004-09-13'),
(2, 2, 1, 6, 'Lucas Caetano', 'lucas_diperifa@gmail.com', '18732329504', 'N4800264', 'Aluno', 'Rua José Aparecido dos Santos, Numero 881, Bairro Loteamento Recanto 15062228 do Lago, CEP ', '2000-09-13'),
(3, 3, NULL, 7, 'Matheus Jhonatan', 'matheus_tank@gmail.com', '12365478914', 'N8436360', 'Aluno', 'Rua Ezequiel Silveira, Numero 446, Bairro Vila Arruda, CEP 18212115', '2003-02-01'),
(4, 4, NULL, 8, 'Anderson Miguel Kaique Galvão', 'anderson.miguel02@gmail.com', '92237816476', 'N2460713', 'Aluno', 'Viela Cinco, Numero 938, Bairro Jardim Fanganiello, CEP 08450562', '2001-08-12'),
(5, 5, NULL, 9, 'Pedro Lucas', 'lulu.apu@gmail.com', '49379496087', 'M8945557', 'Ex-Aluno', 'Rua das maracassitas, nº 1202, bairro marilandia', '2000-12-09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id_arquivo` int(11) NOT NULL,
  `id_aluno_arq` int(11) NOT NULL,
  `tipo_arquivo` varchar(25) NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `arquivo` varchar(250) NOT NULL,
  `status_arquivo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `arquivos`
--

INSERT INTO `arquivos` (`id_arquivo`, `id_aluno_arq`, `tipo_arquivo`, `mes`, `ano`, `arquivo`, `status_arquivo`) VALUES
(1, 1, 'Certificado', 1, 2024, 'C:/xampp/htdocs/freq_alunos/alunos/04153424064/Certificado_04153424064_01_2024.sql', 'Concluida');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(100) NOT NULL,
  `turno_curso` varchar(25) NOT NULL,
  `num_vagas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome_curso`, `turno_curso`, `num_vagas`) VALUES
(1, 'Desenvolvimento de sistemas', 'Noite', 43),
(2, 'Eletroeletrônica', 'Tarde', 19);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `cnpj_empresa` varchar(14) NOT NULL,
  `nome_empresa` varchar(100) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `cnpj_empresa`, `nome_empresa`, `telefone`, `endereco`) VALUES
(1, '77232359000119', 'Bryan e Gabriel Pizzaria Delivery ME', '991140104', 'Alameda Professor Horácio Ribeiro, 911, Jardim Gonçalves, Sorocaba, 18016471');

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatorios`
--

CREATE TABLE `relatorios` (
  `id_relatorio` int(11) NOT NULL,
  `id_empresa_rel` int(11) DEFAULT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `arquivo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `relatorios`
--

INSERT INTO `relatorios` (`id_relatorio`, `id_empresa_rel`, `mes`, `ano`, `arquivo`) VALUES
(1, 1, 7, 2024, 'C:/xampp/htdocs/freq_alunos/empresas/77232359000119/77232359000119_07_2024.pdf'),
(2, 1, 9, 2024, 'C:/xampp/htdocs/freq_alunos/empresas/77232359000119/77232359000119_09_2024.pdf');

-- --------------------------------------------------------

--
-- Estrutura para tabela `responsaveis`
--

CREATE TABLE `responsaveis` (
  `id_responsavel` int(11) NOT NULL,
  `nome_responsavel` varchar(60) NOT NULL,
  `cpf_responsavel` varchar(11) DEFAULT NULL,
  `dt_nasc_responsavel` date NOT NULL,
  `endereco_responsavel` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `responsaveis`
--

INSERT INTO `responsaveis` (`id_responsavel`, `nome_responsavel`, `cpf_responsavel`, `dt_nasc_responsavel`, `endereco_responsavel`) VALUES
(1, 'Anivio Junior', '04153424064', '2004-09-13', 'Rua jose lourenço nº 1140'),
(2, 'Lucas Caetano', '18732329504', '2000-09-13', 'Rua José Aparecido dos Santos, Numero 881, Bairro Loteamento Recanto 15062228 do Lago, CEP '),
(3, 'Matheus Jhonatan', '12365478914', '2003-02-01', 'Rua Ezequiel Silveira, Numero 446, Bairro Vila Arruda, CEP 18212115'),
(4, 'Anderson Miguel Kaique Galvão', '92237816476', '2001-08-12', 'Viela Cinco, Numero 938, Bairro Jardim Fanganiello, CEP 08450562'),
(5, 'Pedro Lucas', '49379496087', '2000-12-09', 'Rua das maracassitas, nº 1202, bairro marilandia');

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitacoes`
--

CREATE TABLE `solicitacoes` (
  `id_solicitacao` int(11) NOT NULL,
  `id_aluno_sol` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `mensagem` varchar(1500) NOT NULL,
  `status_sol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `solicitacoes`
--

INSERT INTO `solicitacoes` (`id_solicitacao`, `id_aluno_sol`, `tipo`, `mensagem`, `status_sol`) VALUES
(1, 1, 'Segunda Via de certificado', 'Olá! Gostaria de Solicitar a minha segunda via do meu certificado.', 'Concluida'),
(2, 2, 'Declaração', 'Olá! Gostaria de Solicitar uma declaração de conclusão do meu curso!', 'Concluida');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_empresa_user` int(11) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `nome_usuario` varchar(50) NOT NULL,
  `cpf_usuario` varchar(11) DEFAULT NULL,
  `dt_nasc_usuario` date NOT NULL,
  `cargo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_empresa_user`, `login`, `senha`, `nome_usuario`, `cpf_usuario`, `dt_nasc_usuario`, `cargo`) VALUES
(1, 1, 'rodrigao_label', '123456789', 'Rodrigo Cesar', '19284442192', '2000-11-25', 'Gerente'),
(2, 1, 'receputi.shark', '123456789', 'Gustavo Recepputi', '86515657552', '2000-03-31', 'Secretário'),
(3, 1, 'Pedrao_codiguin', '123456789', 'Pedro Rodrigues', '09876543211', '2004-12-12', 'Funcionario'),
(4, 1, 'vitin_123', '123456789', 'Vitor Hugo', '20534260607', '2000-11-28', 'Gerente'),
(5, NULL, 'badjuninho', '123456789', 'Anivio Junior', '04153424064', '2004-09-13', 'Aluno'),
(6, NULL, 'di_perifa_lc', '123456789', 'Lucas Caetano', '18732329504', '2000-09-13', 'Aluno'),
(7, NULL, 'matheus_tank_guerra', '123456789', 'Matheus Jhonatan', '12365478914', '2003-02-01', 'Aluno'),
(8, NULL, 'anderson.miguel02', '123456789', 'Anderson Miguel Kaique Galvão', '92237816476', '2001-08-12', 'Aluno'),
(9, NULL, 'lulu.apu', '123456789', 'Pedro Lucas', '49379496087', '2000-12-09', 'Ex-Aluno'),
(10, NULL, 'isabela_bc', '123456789', 'Isabela Garcia Coelho', '73714674004', '1989-11-27', 'Secretário');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`),
  ADD KEY `id_usuario_aluno` (`id_usuario_aluno`),
  ADD KEY `id_resp_aluno` (`id_resp_aluno`),
  ADD KEY `fk_curso_aluno` (`id_curso_aluno`);

--
-- Índices de tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id_arquivo`),
  ADD KEY `id_aluno_arq` (`id_aluno_arq`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices de tabela `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`id_relatorio`),
  ADD KEY `id_empresa_rel` (`id_empresa_rel`);

--
-- Índices de tabela `responsaveis`
--
ALTER TABLE `responsaveis`
  ADD PRIMARY KEY (`id_responsavel`);

--
-- Índices de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD PRIMARY KEY (`id_solicitacao`),
  ADD KEY `fk_id_aluno_sol` (`id_aluno_sol`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_empresa_user` (`id_empresa_user`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id_arquivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id_relatorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `responsaveis`
--
ALTER TABLE `responsaveis`
  MODIFY `id_responsavel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `id_solicitacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_ibfk_2` FOREIGN KEY (`id_usuario_aluno`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `alunos_ibfk_3` FOREIGN KEY (`id_resp_aluno`) REFERENCES `responsaveis` (`id_responsavel`),
  ADD CONSTRAINT `fk_curso_aluno` FOREIGN KEY (`id_curso_aluno`) REFERENCES `cursos` (`id_curso`);

--
-- Restrições para tabelas `arquivos`
--
ALTER TABLE `arquivos`
  ADD CONSTRAINT `arquivos_ibfk_1` FOREIGN KEY (`id_aluno_arq`) REFERENCES `alunos` (`id_aluno`);

--
-- Restrições para tabelas `relatorios`
--
ALTER TABLE `relatorios`
  ADD CONSTRAINT `relatorios_ibfk_1` FOREIGN KEY (`id_empresa_rel`) REFERENCES `empresa` (`id_empresa`);

--
-- Restrições para tabelas `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD CONSTRAINT `fk_id_aluno_sol` FOREIGN KEY (`id_aluno_sol`) REFERENCES `alunos` (`id_aluno`),
  ADD CONSTRAINT `solicitacoes_ibfk_1` FOREIGN KEY (`id_aluno_sol`) REFERENCES `usuarios` (`id_usuario`);

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_empresa_user`) REFERENCES `empresa` (`id_empresa`);
--
-- Banco de dados: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Despejando dados para a tabela `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"freq_alunos\",\"table\":\"cursos\"},{\"db\":\"freq_alunos\",\"table\":\"usuarios\"},{\"db\":\"freq_alunos\",\"table\":\"alunos\"},{\"db\":\"sis_saep\",\"table\":\"solicitacoes\"},{\"db\":\"sis_saep\",\"table\":\"clientes\"},{\"db\":\"freq_alunos\",\"table\":\"arquivos\"}]');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Despejando dados para a tabela `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-06-02 17:06:25', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"pt_BR\"}');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Índices de tabela `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Índices de tabela `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Índices de tabela `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Índices de tabela `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Índices de tabela `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Índices de tabela `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Índices de tabela `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Índices de tabela `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Índices de tabela `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Índices de tabela `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Índices de tabela `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Índices de tabela `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Índices de tabela `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Índices de tabela `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Índices de tabela `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Índices de tabela `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Índices de tabela `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Banco de dados: `sis_saep`
--
CREATE DATABASE IF NOT EXISTS `sis_saep` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sis_saep`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cargo` varchar(30) DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `email`, `telefone`, `cpf`, `endereco`, `login`, `senha`, `cargo`) VALUES
(1, 'Anivio Valerio Junior', 'junior6703@gmail.com', '32991052716', '11122233399', 'Rua josé lourenço, nº 1140, bairro adolfo vireque, são pedro', 'badjuninho', '123456789', 'Gerente'),
(2, 'Rodrigo Cesar', 'orodrigao_label@gmail.com', '32988932105', '00011122233', 'Rua das maracassitas, nº 95, bairro marilandia', 'rodrigao_label', '123456789', 'cliente'),
(3, 'Gustavo Recepputi', 'tubarao.demonio@gmail.com', '32988932105', '33741134007', 'rua arnokowalesky, nº 94, vila cosmo, CEP 13150', 'receputi.shark', '123456789', 'cliente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitacoes`
--

CREATE TABLE `solicitacoes` (
  `id_solicitacao` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `data_solicitacao` date NOT NULL,
  `prioridade` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Aguardando Resposta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `solicitacoes`
--

INSERT INTO `solicitacoes` (`id_solicitacao`, `cliente_id`, `descricao`, `data_solicitacao`, `prioridade`, `status`) VALUES
(1, 1, 'Ordem de serviço para um casamento', '2024-05-17', 'Alta', 'Concluída'),
(2, 2, 'Ordem de serviço para uma formatura de medicina', '2024-05-17', 'Media', 'Aguardando Resposta');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD PRIMARY KEY (`id_solicitacao`),
  ADD KEY `id_cliente` (`cliente_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `id_solicitacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD CONSTRAINT `solicitacoes_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`);
--
-- Banco de dados: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
