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
CREATE DATABASE IF NOT EXISTS `payroll` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `payroll`;


-- Copiando estrutura para tabela payroll.tbbairros
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
CREATE TABLE IF NOT EXISTS `tbcargos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDEMPRESA` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `DESCRICAO` varchar(150) DEFAULT NULL,
  `VLSALARIO` decimal(10,2) DEFAULT NULL,
  `FLATIVO` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbcargos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbcargos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbcargos` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbcidades
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


-- Copiando estrutura para tabela payroll.tbcontato
CREATE TABLE IF NOT EXISTS `tbcontato` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDFUNCIONARIO` int(11) NOT NULL,
  `FLTIPO` char(1) NOT NULL DEFAULT 'T',
  `VALOR` int(11) NOT NULL,
  `FLATIVO` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`ID`,`IDFUNCIONARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbcontato: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbcontato` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbcontato` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbempresas
CREATE TABLE IF NOT EXISTS `tbempresas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(150) NOT NULL,
  `NOMECURTO` varchar(50) NOT NULL,
  `FLATIVO` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbempresas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tbempresas` DISABLE KEYS */;
REPLACE INTO `tbempresas` (`ID`, `NOME`, `NOMECURTO`, `FLATIVO`) VALUES
	(1, 'RECANTO LANCHONETE LTDA.', 'LANCHONETE', 'S'),
	(2, 'RECANTO POSTO LTDA.', 'POSTO', 'S');
/*!40000 ALTER TABLE `tbempresas` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbenderecos
CREATE TABLE IF NOT EXISTS `tbenderecos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ENDERECO` varchar(150) NOT NULL,
  `COMPLEMENTO` varchar(20) NOT NULL,
  `NUMERO` varchar(5) DEFAULT NULL,
  `CEP` varchar(8) NOT NULL,
  `IDBAIRRO` int(11) NOT NULL,
  `FLATIVO` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbenderecos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbenderecos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbenderecos` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbescala
CREATE TABLE IF NOT EXISTS `tbescala` (
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

-- Copiando dados para a tabela payroll.tbescala: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbescala` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbescala` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbestados
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
CREATE TABLE IF NOT EXISTS `tbfuncionarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDCARGO` int(11) NOT NULL DEFAULT '0',
  `IDTURNO` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `APELIDO` varchar(15) NOT NULL,
  `NURG` varchar(15) NOT NULL,
  `NUCPF` varchar(15) NOT NULL,
  `USUARIOPANTERA` varchar(30) NOT NULL,
  `SENHAPANTERA` varchar(20) NOT NULL,
  `VLADICIONAL` decimal(10,2) DEFAULT NULL,
  `FLFOLGUISTA` char(1) NOT NULL,
  `FLPREFFOLGA` varchar(13) NOT NULL DEFAULT 'S;S;S;S;S;S;S',
  `FLCNH` char(1) NOT NULL,
  `FLVALETRANSPORTE` char(1) NOT NULL,
  `NUDEPENDENTES` int(11) DEFAULT NULL,
  `DTADMISSAO` date NOT NULL,
  `DTDEMISSAO` date DEFAULT NULL,
  `DTREGISTRO` date DEFAULT NULL,
  `DTNASCIMENTO` date NOT NULL,
  `DTVENCCARTSAUDE` date NOT NULL,
  `IDENDERECO` int(11) NOT NULL,
  `FLATIVO` char(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbfuncionarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbfuncionarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbfuncionarios` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbitensfolhas
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
CREATE TABLE IF NOT EXISTS `tbturnos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDEMPRESA` int(11) NOT NULL DEFAULT '0',
  `DESCRICAO` varchar(50) NOT NULL,
  `HORAUM` time NOT NULL,
  `HORADOIS` time NOT NULL,
  `HORATRES` time NOT NULL,
  `HORAQUATRO` time NOT NULL,
  `FLPICO` char(1) NOT NULL DEFAULT 'N',
  `FLATIVO` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`ID`,`IDEMPRESA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbturnos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbturnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbturnos` ENABLE KEYS */;


-- Copiando estrutura para tabela payroll.tbusuarios
CREATE TABLE IF NOT EXISTS `tbusuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  `USUARIO` varchar(50) NOT NULL,
  `SENHA` varchar(100) NOT NULL,
  `NIVEL` int(11) NOT NULL DEFAULT '1',
  `FLATIVO` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela payroll.tbusuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tbusuarios` DISABLE KEYS */;
REPLACE INTO `tbusuarios` (`ID`, `NOME`, `USUARIO`, `SENHA`, `NIVEL`, `FLATIVO`) VALUES
	(1, 'Administrador', 'FOLHAADM', 'cc73e901297f4c92a801a8be73fd982b', 1, 'S');
/*!40000 ALTER TABLE `tbusuarios` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
