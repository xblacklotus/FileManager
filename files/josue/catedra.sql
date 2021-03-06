USE [master]
GO
/****** Object:  Database [Gestion_Sistema_Ventas]    Script Date: 06/04/2015 05:59:41 p.m. ******/
CREATE DATABASE [Gestion_Sistema_Ventas]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'Gestion_Sistema_Ventas', FILENAME = N'C:\Program Files (x86)\Microsoft SQL Server\MSSQL11.LEIVA\MSSQL\DATA\Gestion_Sistema_Ventas.mdf' , SIZE = 4160KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'Gestion_Sistema_Ventas_log', FILENAME = N'C:\Program Files (x86)\Microsoft SQL Server\MSSQL11.LEIVA\MSSQL\DATA\Gestion_Sistema_Ventas_log.ldf' , SIZE = 1040KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET COMPATIBILITY_LEVEL = 110
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [Gestion_Sistema_Ventas].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET ARITHABORT OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET AUTO_CLOSE ON 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET AUTO_CREATE_STATISTICS ON 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET  ENABLE_BROKER 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET  MULTI_USER 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET DB_CHAINING OFF 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
USE [Gestion_Sistema_Ventas]
GO
/****** Object:  Table [dbo].[Articulo]    Script Date: 06/04/2015 05:59:41 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Articulo](
	[articulo_id] [int] IDENTITY(1,1) NOT NULL,
	[nombre_articulo] [varchar](35) NOT NULL,
	[existencias] [int] NOT NULL,
	[precio_actual] [numeric](8, 2) NOT NULL,
	[categoria_id] [int] NOT NULL,
	[codigo_barras] [numeric](11, 0) NOT NULL,
	[descripcion] [varchar](max) NULL,
 CONSTRAINT [PK_Articulo] PRIMARY KEY CLUSTERED 
(
	[articulo_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Categoria]    Script Date: 06/04/2015 05:59:41 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Categoria](
	[categoria_id] [int] IDENTITY(1,1) NOT NULL,
	[categoria] [varchar](45) NOT NULL,
	[descripcion] [varchar](max) NULL,
 CONSTRAINT [PK_Categoria] PRIMARY KEY CLUSTERED 
(
	[categoria_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Cliente]    Script Date: 06/04/2015 05:59:41 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Cliente](
	[cliente_id] [int] IDENTITY(1,1) NOT NULL,
	[nombres] [varchar](50) NOT NULL,
	[apellidos] [varchar](50) NOT NULL,
	[usuario] [varchar](20) NOT NULL,
	[contraseña] [varchar](15) NOT NULL,
	[direccion] [varchar](65) NOT NULL,
 CONSTRAINT [PK_Cliente] PRIMARY KEY CLUSTERED 
(
	[cliente_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Detalle_factura]    Script Date: 06/04/2015 05:59:41 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Detalle_factura](
	[factura_id] [int] NOT NULL,
	[articulo_id] [int] NOT NULL,
	[cantidad] [int] NOT NULL
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Factura]    Script Date: 06/04/2015 05:59:41 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Factura](
	[factura_id] [int] IDENTITY(1,1) NOT NULL,
	[cliente_id] [int] NOT NULL,
	[fecha] [date] NOT NULL,
	[monto_final] [numeric](8, 2) NOT NULL,
	[estado] [bit] NOT NULL,
 CONSTRAINT [PK_Factura] PRIMARY KEY CLUSTERED 
(
	[factura_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Imagen]    Script Date: 06/04/2015 05:59:41 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Imagen](
	[imagen_id] [int] IDENTITY(1,1) NOT NULL,
	[articulo_id] [int] NOT NULL,
	[imagen] [varchar](max) NOT NULL,
 CONSTRAINT [PK_Imagen] PRIMARY KEY CLUSTERED 
(
	[imagen_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
ALTER TABLE [dbo].[Articulo]  WITH CHECK ADD  CONSTRAINT [FK_Articulo_Categoria] FOREIGN KEY([categoria_id])
REFERENCES [dbo].[Categoria] ([categoria_id])
GO
ALTER TABLE [dbo].[Articulo] CHECK CONSTRAINT [FK_Articulo_Categoria]
GO
ALTER TABLE [dbo].[Detalle_factura]  WITH CHECK ADD  CONSTRAINT [FK_Detalle_factura_Articulo] FOREIGN KEY([articulo_id])
REFERENCES [dbo].[Articulo] ([articulo_id])
GO
ALTER TABLE [dbo].[Detalle_factura] CHECK CONSTRAINT [FK_Detalle_factura_Articulo]
GO
ALTER TABLE [dbo].[Detalle_factura]  WITH CHECK ADD  CONSTRAINT [FK_Detalle_factura_Factura] FOREIGN KEY([factura_id])
REFERENCES [dbo].[Factura] ([factura_id])
GO
ALTER TABLE [dbo].[Detalle_factura] CHECK CONSTRAINT [FK_Detalle_factura_Factura]
GO
ALTER TABLE [dbo].[Factura]  WITH CHECK ADD  CONSTRAINT [FK_Factura_Cliente] FOREIGN KEY([cliente_id])
REFERENCES [dbo].[Cliente] ([cliente_id])
GO
ALTER TABLE [dbo].[Factura] CHECK CONSTRAINT [FK_Factura_Cliente]
GO
ALTER TABLE [dbo].[Imagen]  WITH CHECK ADD  CONSTRAINT [FK_Imagen_Articulo] FOREIGN KEY([articulo_id])
REFERENCES [dbo].[Articulo] ([articulo_id])
GO
ALTER TABLE [dbo].[Imagen] CHECK CONSTRAINT [FK_Imagen_Articulo]
GO
USE [master]
GO
ALTER DATABASE [Gestion_Sistema_Ventas] SET  READ_WRITE 
GO
