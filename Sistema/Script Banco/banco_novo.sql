-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.13-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para payroll
DROP DATABASE IF EXISTS `payroll`;
CREATE DATABASE IF NOT EXISTS `payroll` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `payroll`;


-- Copiando estrutura para tabela payroll.tbbairros
DROP TABLE IF EXISTS `tbbairros`;
CREATE TABLE IF NOT EXISTS `tbbairros` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDCIDADE` int(11) NOT NULL DEFAULT '0',
  `NOME` varchar(50) NOT NULL,
  `FLATIVO` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`ID`,`IDCIDADE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbbairros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbbairros` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbbairros` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbcargos
DROP TABLE IF EXISTS `tbcargos`;
CREATE TABLE IF NOT EXISTS `tbcargos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDEMPRESA` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `DESCRICAO` varchar(150) DEFAULT NULL,
  `VLADICIONAL` decimal(10,2) DEFAULT NULL,
  `FLATIVO` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbcargos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tbcargos` DISABLE KEYS */;
INSERT IGNORE INTO `tbcargos` (`ID`, `IDEMPRESA`, `NOME`, `DESCRICAO`, `VLADICIONAL`, `FLATIVO`) VALUES
	(1, 1, 'teste', 'teste', 50.00, 'S'),
	(2, 1, 'Programador', '', 0.00, 'N'),
	(3, 2, 'teste emp 2', '', 0.00, 'S'),
	(5, 1, 'teste', 'teste lanchonet', 5000.00, 'S');
/*!40000 ALTER TABLE `tbcargos` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbcidades
DROP TABLE IF EXISTS `tbcidades`;
CREATE TABLE IF NOT EXISTS `tbcidades` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDESTADO` int(11) NOT NULL DEFAULT '0',
  `NOME` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`,`IDESTADO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbcidades: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbcidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbcidades` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbconfiguracoes
DROP TABLE IF EXISTS `tbconfiguracoes`;
CREATE TABLE IF NOT EXISTS `tbconfiguracoes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDEMPRESA` int(11) NOT NULL,
  `TITULO` varchar(50) NOT NULL,
  `DESCRICAO` varchar(150) DEFAULT NULL,
  `VALOR` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbconfiguracoes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbconfiguracoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbconfiguracoes` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbempresas
DROP TABLE IF EXISTS `tbempresas`;
CREATE TABLE IF NOT EXISTS `tbempresas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(150) NOT NULL,
  `NOMECURTO` varchar(50) NOT NULL,
  `FLATIVO` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbempresas: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `tbempresas` DISABLE KEYS */;
INSERT IGNORE INTO `tbempresas` (`ID`, `NOME`, `NOMECURTO`, `FLATIVO`) VALUES
	(1, 'RECANTO LANCHONETE LTDA.', 'LANCHONETE', 'S'),
	(2, 'RECANTO POSTO LTDA.', 'POSTO', 'S'),
	(3, 'tete', 'tete', 'N'),
	(4, 'tete', 'tete', 'N'),
	(5, 'tr', 'te', 'N'),
	(6, 'teste', 'te', 'N'),
	(7, 't', 'r', 'N'),
	(8, 'kakaka', 'kakak', 'N'),
	(9, 'akkaka', 'akakka', 'N'),
	(10, 'zzzzzzzz', 'zzzz', 'N');
/*!40000 ALTER TABLE `tbempresas` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbescalas
DROP TABLE IF EXISTS `tbescalas`;
CREATE TABLE IF NOT EXISTS `tbescalas` (
  `IDFOLGANTE` int(11) NOT NULL,
  `IDFOLGUISTA` int(11) NOT NULL,
  `DATA` date NOT NULL,
  `OBSERVACAO` varchar(200) DEFAULT NULL,
  `HORAUM` time NOT NULL,
  `HORADOIS` time NOT NULL,
  `HORATRES` time NOT NULL,
  `HORAQUATRO` time NOT NULL,
  PRIMARY KEY (`DATA`,`IDFOLGUISTA`,`IDFOLGANTE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbescalas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbescalas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbescalas` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbestados
DROP TABLE IF EXISTS `tbestados`;
CREATE TABLE IF NOT EXISTS `tbestados` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  `UF` varchar(2) NOT NULL,
  `PAIS` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbestados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbestados` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbestados` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbferias
DROP TABLE IF EXISTS `tbferias`;
CREATE TABLE IF NOT EXISTS `tbferias` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDFUNCIONARIO` int(11) NOT NULL,
  `DTINICIO` date NOT NULL,
  `DTTERMINO` date NOT NULL,
  PRIMARY KEY (`ID`,`IDFUNCIONARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbferias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbferias` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbferias` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbfolhas
DROP TABLE IF EXISTS `tbfolhas`;
CREATE TABLE IF NOT EXISTS `tbfolhas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDFUNCIONARIO` int(11) NOT NULL,
  `DATA` date NOT NULL,
  `HREXTRA` time NOT NULL,
  `HRFERIADO` time NOT NULL,
  `HRFALTA` time NOT NULL,
  `HRFALTAJUSTIF` time NOT NULL,
  `VLBRUTO` decimal(10,0) NOT NULL,
  `VLLIQUIDO` decimal(10,0) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbfolhas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbfolhas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbfolhas` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbfuncionarios
DROP TABLE IF EXISTS `tbfuncionarios`;
CREATE TABLE IF NOT EXISTS `tbfuncionarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDEMPRESA` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `APELIDO` varchar(15) NOT NULL,
  `IDCARGO` int(11) NOT NULL DEFAULT '0',
  `IDTURNO` int(11) NOT NULL,
  `NURG` varchar(15) NOT NULL,
  `NUCPF` varchar(15) NOT NULL,
  `USUARIOPANTERA` varchar(30) NOT NULL,
  `SENHAPANTERA` varchar(20) NOT NULL,
  `VLADICIONAL` decimal(10,2) DEFAULT NULL,
  `FLFOLGUISTA` char(1) NOT NULL DEFAULT 'N',
  `FLPREFFOLGA` varchar(13) NOT NULL DEFAULT 'S;S;S;S;S;S;S',
  `FLCNH` char(1) NOT NULL DEFAULT 'N',
  `FLVALETRANSPORTE` char(1) NOT NULL DEFAULT 'N',
  `NUDEPENDENTE` int(11) DEFAULT NULL,
  `DTADMISSAO` date NOT NULL,
  `DTDEMISSAO` date DEFAULT NULL,
  `DTREGISTRO` date DEFAULT NULL,
  `DTNASCIMENTO` date NOT NULL,
  `DTCARTSAUDE` date NOT NULL,
  `DSENDERECO` varchar(300) NOT NULL,
  `NUCELULAR` varchar(11) NOT NULL,
  `NUTELEFONE` varchar(11) NOT NULL,
  `DSEMAIL` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbfuncionarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbfuncionarios` DISABLE KEYS */;
INSERT IGNORE INTO `tbfuncionarios` (`ID`, `IDEMPRESA`, `NOME`, `APELIDO`, `IDCARGO`, `IDTURNO`, `NURG`, `NUCPF`, `USUARIOPANTERA`, `SENHAPANTERA`, `VLADICIONAL`, `FLFOLGUISTA`, `FLPREFFOLGA`, `FLCNH`, `FLVALETRANSPORTE`, `NUDEPENDENTE`, `DTADMISSAO`, `DTDEMISSAO`, `DTREGISTRO`, `DTNASCIMENTO`, `DTCARTSAUDE`, `DSENDERECO`, `NUCELULAR`, `NUTELEFONE`, `DSEMAIL`) VALUES
	(1, 1, 'Nicolas Fraga Faust', '220', 5, 1, '909', '0909', 'akjdoaklj', 'paksldkaml', 0.00, 'S', 'S|N|N|S|N|S|S', 'S', 'N', 0, '2016-11-19', '0000-00-00', '2016-11-19', '2016-11-19', '2016-11-19', '09098|098|098|098|098|09|SC', '9890898', '09809809', 'nicolas.faust@hormail.com');
/*!40000 ALTER TABLE `tbfuncionarios` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbitensfolhas
DROP TABLE IF EXISTS `tbitensfolhas`;
CREATE TABLE IF NOT EXISTS `tbitensfolhas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDFOLHA` int(11) NOT NULL,
  `IDFUNCIONARIO` int(11) NOT NULL,
  `FLRECDESP` char(1) NOT NULL,
  `DESCRICAO` varchar(150) NOT NULL,
  `VALOR` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`,`IDFOLHA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbitensfolhas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbitensfolhas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbitensfolhas` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tblancamentos
DROP TABLE IF EXISTS `tblancamentos`;
CREATE TABLE IF NOT EXISTS `tblancamentos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDFUNCIONARIO` int(11) NOT NULL,
  `DATA` date NOT NULL,
  `IDTIPOPANCAMENTO` int(11) NOT NULL,
  `INDICE` int(11) NOT NULL DEFAULT '1',
  `DESCRICAO` varchar(50) NOT NULL,
  `VALOR` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`,`IDFUNCIONARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tblancamentos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tblancamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblancamentos` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbmodelos
DROP TABLE IF EXISTS `tbmodelos`;
CREATE TABLE IF NOT EXISTS `tbmodelos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  `DESCRIÇÃO` varchar(200) DEFAULT NULL,
  `CONTEUDO` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbmodelos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbmodelos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbmodelos` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbprodutos
DROP TABLE IF EXISTS `tbprodutos`;
CREATE TABLE IF NOT EXISTS `tbprodutos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  `VALOR` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbprodutos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbprodutos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbprodutos` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbtipolancamento
DROP TABLE IF EXISTS `tbtipolancamento`;
CREATE TABLE IF NOT EXISTS `tbtipolancamento` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  `FLRECDESP` char(1) NOT NULL DEFAULT 'D',
  `FLSALARIOFAMILIA` char(1) NOT NULL DEFAULT 'N',
  `FLCOMPRA` char(1) NOT NULL DEFAULT 'S',
  `FLATIVO` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbtipolancamento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbtipolancamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbtipolancamento` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbturnos
DROP TABLE IF EXISTS `tbturnos`;
CREATE TABLE IF NOT EXISTS `tbturnos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDEMPRESA` int(11) NOT NULL DEFAULT '0',
  `NOME` varchar(50) NOT NULL,
  `HORAUM` time NOT NULL,
  `HORADOIS` time NOT NULL,
  `HORATRES` time NOT NULL,
  `HORAQUATRO` time NOT NULL,
  `FLPICO` char(1) NOT NULL DEFAULT 'N',
  `FLATIVO` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`ID`,`IDEMPRESA`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbturnos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tbturnos` DISABLE KEYS */;
INSERT IGNORE INTO `tbturnos` (`ID`, `IDEMPRESA`, `NOME`, `HORAUM`, `HORADOIS`, `HORATRES`, `HORAQUATRO`, `FLPICO`, `FLATIVO`) VALUES
	(1, 1, 'Manha', '08:00:00', '12:00:00', '13:30:00', '18:18:00', 'N', 'S');
/*!40000 ALTER TABLE `tbturnos` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbusuarios
DROP TABLE IF EXISTS `tbusuarios`;
CREATE TABLE IF NOT EXISTS `tbusuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  `USUARIO` varchar(50) NOT NULL,
  `SENHA` varchar(100) NOT NULL,
  `NIVEL` int(11) NOT NULL DEFAULT '1',
  `FLATIVO` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbusuarios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tbusuarios` DISABLE KEYS */;
INSERT IGNORE INTO `tbusuarios` (`ID`, `NOME`, `USUARIO`, `SENHA`, `NIVEL`, `FLATIVO`) VALUES
	(1, 'Administrador', 'FOLHAADM', 'cc73e901297f4c92a801a8be73fd982b', 1, 'S'),
	(2, 'Nicolas Fraga Faust', 'NICOLASS2', 'c4ca4238a0b923820dcc509a6f75849b', 1, 'N'),
	(3, 'Teste', 'NICOLAS', 'c4ca4238a0b923820dcc509a6f75849b', 1, 'N'),
	(4, 'yaasd', 'NICOLA', 'c4ca4238a0b923820dcc509a6f75849b', 2, 'N');
/*!40000 ALTER TABLE `tbusuarios` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
